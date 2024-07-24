<?php $__env->startSection('title'); ?>
    <?php echo e($page_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="flex justify-center items-center">
        <div class="bg-blue-100 m-20 ml-40 p-12 rounded-lg shadow-md max-w-4xl">
            <h1 class="text-4xl font-bold mb-6 text-blue-800"><?php echo e($page_name); ?></h1>
                <h2 class="text-xl font-bold text-blue-800">
                    <?php if(auth()->guard()->check()): ?>
                        Welcome, <?php echo e(auth()->user()->name); ?>

                    <?php else: ?>
                        Welcome, Guest
                    <?php endif; ?>
                </h2>
            <p class="text-gray-700">Welcome to the <?php echo e($page_name); ?> of my website. This is a sample page content styled with cooler Tailwind CSS.</p>
            <div class="mt-8">
                <h2 class="text-3xl font-semibold mb-4">Latest Articles</h2>
                <ul class="space-y-4">
                    <li class="p-4 bg-green-100 rounded-lg shadow-sm">
                        <h3 class="text-xl font-bold text-green-800">Article 1</h3>
                        <p class="text-gray-700">Summary of the first article...</p>
                    </li>
                    <li class="p-4 bg-yellow-100 rounded-lg shadow-sm">
                        <h3 class="text-xl font-bold text-yellow-800">Article 2</h3>
                        <p class="text-gray-700">Summary of the second article...</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_sections'); ?>
    <section class="bg-purple-200 py-8 flex justify-center items-center">
        <div class="container mx-auto text-center max-w-4xl">
            <h2 class="text-3xl font-bold mb-4 text-purple-800">Additional Section</h2>
            <p class="text-gray-700">This is an additional section that can be used for special announcements or features.</p>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_text'); ?>
    © 2024 My Website. Built with Laravel and cooler Tailwind CSS.
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/pages/welcome.blade.php ENDPATH**/ ?>