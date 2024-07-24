<?php $__env->startSection('title'); ?>
    Latest Posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<div class="bg-gray-50 p-8 rounded-lg shadow-2xl mb-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl mx-auto">
        <!-- Page Title -->
        <h1 class="text-6xl font-extrabold mb-12 text-blue-900 text-center font-oswald">Latest Posts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal4791c27587e64118b1fe477bced8deb1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4791c27587e64118b1fe477bced8deb1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.postCard','data' => ['post' => $post]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('postCard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4791c27587e64118b1fe477bced8deb1)): ?>
<?php $attributes = $__attributesOriginal4791c27587e64118b1fe477bced8deb1; ?>
<?php unset($__attributesOriginal4791c27587e64118b1fe477bced8deb1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4791c27587e64118b1fe477bced8deb1)): ?>
<?php $component = $__componentOriginal4791c27587e64118b1fe477bced8deb1; ?>
<?php unset($__componentOriginal4791c27587e64118b1fe477bced8deb1); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="mt-8">
            <?php echo e($posts->links()); ?>

        </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/posts/index.blade.php ENDPATH**/ ?>