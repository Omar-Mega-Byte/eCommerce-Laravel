<?php $__env->startSection('title', '<?php echo e($page_name); ?>'); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4"><?php echo e($page_name); ?></h1>
        <p>Welcome to the <?php echo e($page_name); ?> of my website. This is a sample page content styled with Tailwind CSS.</p>
        <!-- Additional Content -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Latest Articles</h2>
            <ul class="space-y-4">
                <li class="p-4 bg-gray-100 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold">Article 1</h3>
                    <p class="text-gray-700">Summary of the first article...</p>
                </li>
                <li class="p-4 bg-gray-100 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold">Article 2</h3>
                    <p class="text-gray-700">Summary of the second article...</p>
                </li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_sections'); ?>
    <section class="bg-gray-200 py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Additional Section</h2>
            <p>This is an additional section that can be used for special announcements or features.</p>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_text'); ?>
    © 2024 My Website. Built with Laravel and Tailwind CSS.
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/pages/contact.blade.php ENDPATH**/ ?>