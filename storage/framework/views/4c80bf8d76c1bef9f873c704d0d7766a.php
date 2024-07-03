<?php $__env->startSection('title'); ?>
    About
<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
    <div class="container">
        <h1><?php echo e($page_name); ?></h1>
        <p><?php echo e($page_description); ?></p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/about.blade.php ENDPATH**/ ?>