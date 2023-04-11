<?php echo $__env->yieldContent('top'); ?>

<div class="settings-container">
    <header>
        <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-cloud.svg">
        <h1><?php echo e($title); ?><?php echo $__env->yieldContent('header-title'); ?></h1>
        <?php echo $__env->yieldContent('header'); ?>
    </header>
    <div class="settings-body <?php if (\MediaCloud\Plugin\Utilities\LicensingManager::ActivePlan('free')): ?> show-upgrade <?php endif; ?>">
        <div class="settings-interior">
            <div class="ilab-notification-container"></div>
            <?php echo $__env->yieldContent('main'); ?>
        </div>
        <?php if (\MediaCloud\Plugin\Utilities\LicensingManager::ActivePlan('free')): ?>
        <?php echo $__env->make('base/upgrade', \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH /var/www/html/wp-content/plugins/ilab-media-tools/views////templates/sub-page.blade.php ENDPATH**/ ?>