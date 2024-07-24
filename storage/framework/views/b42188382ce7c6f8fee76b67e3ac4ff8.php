<?php $__env->startSection('title'); ?>
    <?php echo e($page_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<?php if(session('success')): ?>
<div>
    <p class="text-green-500 font-bold mb-5">
        <?php if (isset($component)) { $__componentOriginalc115b9ff12b76915cc22a6040e27d5b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc115b9ff12b76915cc22a6040e27d5b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flashMsg','data' => ['msg' => ''.e(session('success')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flashMsg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['msg' => ''.e(session('success')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc115b9ff12b76915cc22a6040e27d5b7)): ?>
<?php $attributes = $__attributesOriginalc115b9ff12b76915cc22a6040e27d5b7; ?>
<?php unset($__attributesOriginalc115b9ff12b76915cc22a6040e27d5b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc115b9ff12b76915cc22a6040e27d5b7)): ?>
<?php $component = $__componentOriginalc115b9ff12b76915cc22a6040e27d5b7; ?>
<?php unset($__componentOriginalc115b9ff12b76915cc22a6040e27d5b7); ?>
<?php endif; ?></p>
</div>
<?php endif; ?>

<!-- Contact Us Form -->
<div class="bg-white p-6 rounded-lg shadow-lg mb-6">
<h2 class="text-2xl font-semibold text-gray-900 mb-6">Contact Us!</h2>
<form action="<?php echo e(route('contacts.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

<!-- NameField -->
<div class="mb-6">
    <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
    <input type="text" id="name" name="name" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 font-bold text-xs italic mt-2"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<!-- Email Field -->
<div class="mb-6">
    <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
    <input type="text" id="email" name="email" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 font-bold text-xs italic mt-2"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<!-- Message Field -->
<div class="mb-6">
    <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
    <textarea id="message" name="message" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" rows="5"></textarea>
    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 font-bold text-xs italic mt-2"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">Submit</button>
    </div>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_text'); ?>
    © 2024 My Website. Built with Laravel and cooler Tailwind CSS.
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/pages/contact.blade.php ENDPATH**/ ?>