  <header>
        <nav class="container">
            <div class="logo">Droob</div>
            <ul class="nav-links">
                <li><a href="#home"><?php echo e(__('front.home')); ?></a></li>
                <li><a href="#features"><?php echo e(__('front.features')); ?></a></li>
                <li><a href="#apps"><?php echo e(__('front.apps')); ?></a></li>
                <li><a href="#safety"><?php echo e(__('front.safety')); ?></a></li>
                <li><a href="#contact"><?php echo e(__('front.contact')); ?></a></li>
                <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="nav-link"  hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                        <?php echo e($properties['native']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
    </header><?php /**PATH C:\xampp\htdocs\droob\resources\views/user/includes/header.blade.php ENDPATH**/ ?>