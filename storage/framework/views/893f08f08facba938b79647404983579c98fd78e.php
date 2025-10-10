
<?php $__env->startSection('content'); ?>
   <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1><?php echo e(__('front.your_ride_your_way')); ?></h1>
                    <p><?php echo e(__('front.hero_description')); ?></p>
                    
                    <div class="hero-image">
                        <!-- Replace this div with your actual hero image -->
                        <div class="photo-placeholder" style="height: 300px; max-width: 600px; margin: 0 auto;">
                            <div>
                                <i class="fas fa-image" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                                Hero Image<br>
                                <small>(App screenshot or city/car photo)</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cta-buttons">
                        <a href="#apps" class="btn btn-primary">
                            <i class="fas fa-mobile-alt"></i>
                            <?php echo e(__('front.download_app')); ?>

                        </a>
                        <a href="#features" class="btn btn-secondary">
                            <i class="fas fa-play"></i>
                            <?php echo e(__('front.learn_more')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- App Download Section -->
        <section id="apps" class="app-download">
            <div class="container">
                <h2><?php echo e(__('front.download_droob')); ?></h2>
                <p><?php echo e(__('front.available_platforms')); ?></p>
                
                <div class="app-preview">
                    <div class="app-preview-item">
                        <!-- Replace with rider app screenshot -->
                        <div class="photo-placeholder" style="width: 200px; height: 400px; margin: 0 auto 2rem;">
                            <div>
                                <i class="fas fa-mobile-alt" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                Rider App<br>Screenshot
                            </div>
                        </div>
                        <h3><?php echo e(__('front.for_riders')); ?></h3>
                    </div>
                    <div class="app-preview-item">
                        <!-- Replace with driver app screenshot -->
                        <div class="photo-placeholder" style="width: 200px; height: 400px; margin: 0 auto 2rem;">
                            <div>
                                <i class="fas fa-mobile-alt" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                Driver App<br>Screenshot
                            </div>
                        </div>
                        <h3><?php echo e(__('front.for_drivers')); ?></h3>
                    </div>
                </div>
                
                <div class="download-buttons">
                    <a href="#" class="download-btn">
                        <i class="fab fa-apple"></i>
                        <div class="download-text">
                            <small><?php echo e(__('front.download_app_store')); ?></small>
                            <span><?php echo e(__('front.app_store')); ?></span>
                        </div>
                    </a>
                    <a href="#" class="download-btn">
                        <i class="fab fa-google-play"></i>
                        <div class="download-text">
                            <small><?php echo e(__('front.get_it_on')); ?></small>
                            <span><?php echo e(__('front.google_play')); ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo e(__('front.why_choose_droob')); ?></h2>
                    <p><?php echo e(__('front.features_description')); ?></p>
                </div>
                
                <div class="features-with-image">
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="feature-content">
                                <h3><?php echo e(__('front.lightning_fast_matching')); ?></h3>
                                <p><?php echo e(__('front.lightning_fast_description')); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="feature-content">
                                <h3><?php echo e(__('front.transparent_pricing')); ?></h3>
                                <p><?php echo e(__('front.transparent_pricing_description')); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3><?php echo e(__('front.real_time_tracking')); ?></h3>
                                <p><?php echo e(__('front.real_time_tracking_description')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="features-image">
                        <!-- Replace with app features screenshot or demo -->
                        <div class="photo-placeholder" style="height: 400px;">
                            <div>
                                <i class="fas fa-image" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                                App Features Screenshot<br>
                                <small>(Show the app interface)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- User vs Driver Apps -->
        <section class="user-driver">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo e(__('front.two_apps_one_platform')); ?></h2>
                    <p><?php echo e(__('front.apps_description')); ?></p>
                </div>
                <div class="user-driver-grid">
                    <div class="user-driver-card">
                        <div class="app-mockup">
                            <!-- Replace with actual rider app screenshot -->
                            <div class="photo-placeholder" style="width: 180px; height: 320px; margin: 0 auto;">
                                <div>
                                    <i class="fas fa-user" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                    Rider App<br>Interface
                                </div>
                            </div>
                        </div>
                        <h3><?php echo e(__('front.droob_rider')); ?></h3>
                        <p class="subtitle"><?php echo e(__('front.rider_subtitle')); ?></p>
                        <ul class="app-features">
                            <li><i class="fas fa-search"></i> <?php echo e(__('front.find_nearby_drivers')); ?></li>
                            <li><i class="fas fa-route"></i> <?php echo e(__('front.multiple_ride_options')); ?></li>
                            <li><i class="fas fa-clock"></i> <?php echo e(__('front.schedule_rides')); ?></li>
                            <li><i class="fas fa-star"></i> <?php echo e(__('front.rate_review_drivers')); ?></li>
                            <li><i class="fas fa-receipt"></i> <?php echo e(__('front.trip_history')); ?></li>
                            <li><i class="fas fa-gift"></i> <?php echo e(__('front.referral_rewards')); ?></li>
                        </ul>
                    </div>

                    <div class="user-driver-card">
                        <div class="app-mockup">
                            <!-- Replace with actual driver app screenshot -->
                            <div class="photo-placeholder" style="width: 180px; height: 320px; margin: 0 auto;">
                                <div>
                                    <i class="fas fa-car" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                    Driver App<br>Interface
                                </div>
                            </div>
                        </div>
                        <h3><?php echo e(__('front.droob_driver')); ?></h3>
                        <p class="subtitle"><?php echo e(__('front.driver_subtitle')); ?></p>
                        <ul class="app-features">
                            <li><i class="fas fa-money-bill-wave"></i> <?php echo e(__('front.flexible_earning')); ?></li>
                            <li><i class="fas fa-navigation"></i> <?php echo e(__('front.smart_route')); ?></li>
                            <li><i class="fas fa-chart-line"></i> <?php echo e(__('front.earnings_tracking')); ?></li>
                            <li><i class="fas fa-calendar-alt"></i> <?php echo e(__('front.set_schedule')); ?></li>
                            <li><i class="fas fa-credit-card"></i> <?php echo e(__('front.instant_payment')); ?></li>
                            <li><i class="fas fa-users"></i> <?php echo e(__('front.driver_community')); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Safety Section -->
        <section id="safety" class="safety">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo e(__('front.safety_priority')); ?></h2>
                    <p><?php echo e(__('front.safety_description')); ?></p>
                </div>
                <div class="safety-content">
                    <div class="safety-image">
                        <!-- Replace with safety-related photo -->
                        <div class="photo-placeholder" style="height: 400px;">
                            <div>
                                <i class="fas fa-shield-alt" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                                Safety Features Photo<br>
                                <small>(App safety screen or secure car photo)</small>
                            </div>
                        </div>
                    </div>
                    <div class="safety-features">
                        <div class="safety-item">
                            <div class="safety-icon">
                                <i class="fas fa-video"></i>
                            </div>
                            <div>
                                <h3><?php echo e(__('front.in_app_recording')); ?></h3>
                                <p><?php echo e(__('front.recording_description')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo e(__('front.droob_by_numbers')); ?></h2>
                    <p><?php echo e(__('front.stats_description')); ?></p>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h3>5M+</h3>
                        <p><?php echo e(__('front.active_users')); ?></p>
                    </div>
                    <div class="stat-item">
                        <h3>500K+</h3>
                        <p><?php echo e(__('front.registered_drivers')); ?></p>
                    </div>
                    <div class="stat-item">
                        <h3>100+</h3>
                        <p><?php echo e(__('front.cities_covered')); ?></p>
                    </div>
                    <div class="stat-item">
                        <h3>4.9★</h3>
                        <p><?php echo e(__('front.app_store_rating')); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo e(__('front.what_users_say')); ?></h2>
                    <p><?php echo e(__('front.testimonials_description')); ?></p>
                </div>
                <div class="testimonial-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <!-- Replace with actual user photo -->
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="testimonial-text">"<?php echo e(__('front.testimonial_1')); ?>"</p>
                        <div class="testimonial-author"><?php echo e(__('front.testimonial_1_author')); ?></div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <!-- Replace with actual user photo -->
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="testimonial-text">"<?php echo e(__('front.testimonial_2')); ?>"</p>
                        <div class="testimonial-author"><?php echo e(__('front.testimonial_2_author')); ?></div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <!-- Replace with actual user photo -->
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="testimonial-text">"<?php echo e(__('front.testimonial_3')); ?>"</p>
                        <div class="testimonial-author"><?php echo e(__('front.testimonial_3_author')); ?></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\droob\resources\views/user/home.blade.php ENDPATH**/ ?>