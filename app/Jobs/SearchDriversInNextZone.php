<?php

namespace App\Jobs;

use App\Models\Driver;
use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SearchDriversInNextZone implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderId;
    protected $currentRadius;
    protected $serviceId;
    protected $userLat;
    protected $userLng;

    public $tries = 1; // ✅ Only try once
    public $timeout = 30; // ✅ Max 30 seconds

    public function __construct($orderId, $currentRadius, $serviceId, $userLat, $userLng)
    {
        $this->orderId = $orderId;
        $this->currentRadius = $currentRadius;
        $this->serviceId = $serviceId;
        $this->userLat = $userLat;
        $this->userLng = $userLng;
        
        // ✅ DON'T set delay here - it's set when dispatching
    }

    public function handle()
    {
        try {
            // ✅ CRITICAL: Check order status at the very start
            $order = Order::find($this->orderId);
            
            if (!$order) {
                \Log::info("Job: Order {$this->orderId} not found. Stopping search.");
                return;
            }

            // ✅ Stop if order is no longer pending
            if ($order->status != OrderStatus::Pending) {
                \Log::info("Job: Order {$this->orderId} status changed to {$order->status->value}. Stopping search.");
                return;
            }

            // ✅ Check if order already has a driver
            if ($order->driver_id) {
                \Log::info("Job: Order {$this->orderId} already assigned to driver {$order->driver_id}. Stopping search.");
                return;
            }
            
            $initialRadius = \DB::table('settings')
                ->where('key', 'find_drivers_in_radius')
                ->value('value') ?? 5;
            
            $maximumRadius = \DB::table('settings')
                ->where('key', 'maximum_radius_to_find_drivers')
                ->value('value') ?? 20;
            
            $nextRadius = $this->currentRadius + $initialRadius;
            
            if ($nextRadius > $maximumRadius) {
                \Log::info("Job: Max radius {$maximumRadius}km reached for order {$this->orderId}. Stopping search.");
                return;
            }
            
            \Log::info("Job: Expanding search to {$nextRadius}km for order {$this->orderId}");
            
            // ✅ Check if order is still pending before checking drivers
            $order->refresh();
            if ($order->status != OrderStatus::Pending || $order->driver_id) {
                \Log::info("Job: Order {$this->orderId} status changed during job execution. Stopping.");
                return;
            }

            // ✅ Just check if drivers exist - don't use Firestore in Job
            $availableDrivers = $this->checkAvailableDrivers($this->serviceId, $nextRadius);
            
            if ($availableDrivers > 0) {
                \Log::info("Job: Found {$availableDrivers} potential drivers in {$nextRadius}km - triggering web update for order {$this->orderId}");
                
                // ✅ Final check before triggering Firebase update
                $order->refresh();
                if ($order->status != OrderStatus::Pending || $order->driver_id) {
                    \Log::info("Job: Order {$this->orderId} status changed before Firebase update. Stopping.");
                    return;
                }

                // ✅ Trigger a web request to update Firebase (has gRPC)
                $this->triggerFirebaseUpdate($nextRadius);
            } else {
                \Log::info("Job: No drivers found in {$nextRadius}km for order {$this->orderId}");
            }
            
            // ✅ Schedule next expansion only if order is still pending
            if ($nextRadius < $maximumRadius) {
                $order->refresh();
                if ($order->status == OrderStatus::Pending && !$order->driver_id) {
                    SearchDriversInNextZone::dispatch(
                        $this->orderId,
                        $nextRadius,
                        $this->serviceId,
                        $this->userLat,
                        $this->userLng
                    )->delay(now()->addSeconds(30));
                    
                    \Log::info("Job: Scheduled next zone search for order {$this->orderId} at radius {$nextRadius}km + {$initialRadius}km");
                } else {
                    \Log::info("Job: Not scheduling next zone - order {$this->orderId} is no longer pending");
                }
            }
            
        } catch (\Exception $e) {
            \Log::error("Job Error in SearchDriversInNextZone for order {$this->orderId}: " . $e->getMessage());
        }
    }
    
    /**
     * ✅ Check if drivers are available (MySQL only - no Firestore)
     */
    private function checkAvailableDrivers($serviceId, $radius)
    {
        $minWalletBalance = \DB::table('settings')
            ->where('key', 'minimum_money_in_wallet_driver_to_get_order')
            ->value('value') ?? 0;
        
        $query = Driver::where('status', 1)
            ->where('activate', 1)
            ->where('balance', '>=', $minWalletBalance)
            ->whereNotIn('id', function($query) {
                $query->select('driver_id')
                    ->from('orders')
                    ->whereIn('status', ['pending', 'accepted', 'on_the_way', 'started', 'arrived'])
                    ->whereNotNull('driver_id');
            })
            ->whereHas('services', function($query) use ($serviceId) {
                $query->where('service_id', $serviceId)
                    ->where('driver_services.status', 1);
            });
        
        // ✅ Exclude drivers who rejected this order
        $query->whereNotIn('id', function($subQuery) {
            $subQuery->select('driver_id')
                ->from('order_rejections')
                ->where('order_id', $this->orderId);
        });
        
        return $query->count();
    }
    
    /**
     * ✅ Trigger Firebase update via HTTP request (runs in web context with gRPC)
     */
    private function triggerFirebaseUpdate($radius)
    {
        try {
            $url = config('app.url') . '/api/internal/update-order-radius';
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'order_id' => $this->orderId,
                'radius' => $radius,
                'user_lat' => $this->userLat,
                'user_lng' => $this->userLng,
                'service_id' => $this->serviceId,
            ]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode == 200) {
                \Log::info("Job: Successfully triggered Firebase update for order {$this->orderId} at {$radius}km");
            } else {
                \Log::warning("Job: Firebase update returned HTTP {$httpCode} for order {$this->orderId}");
            }
            
        } catch (\Exception $e) {
            \Log::error("Job: Failed to trigger Firebase update for order {$this->orderId}: " . $e->getMessage());
        }
    }
}