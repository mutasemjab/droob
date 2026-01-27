<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_drivers_notified', function (Blueprint $table) {
            // Drop the existing foreign key constraint with cascade delete
            $table->dropForeign(['order_id']);
            
            // Re-add the foreign key constraint WITHOUT cascade delete
            // Using 'restrict' prevents order deletion if notification records exist
            // Using 'no action' allows the order to exist independently
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('no action'); // Keeps notification history when order is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_drivers_notified', function (Blueprint $table) {
            // Drop the modified foreign key
            $table->dropForeign(['order_id']);
            
            // Restore the original cascade delete behavior
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }
};