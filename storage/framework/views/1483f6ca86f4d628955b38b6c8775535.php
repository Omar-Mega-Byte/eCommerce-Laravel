<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Unknown Page'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-blue-950 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="text-2xl font-bold">eCommerce</div>
            <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </header>

    <div class="container mx-auto flex flex-wrap px-4 py-8">
        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 mb-8 md:mb-0">
            <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>

        <main class="w-full md:w-3/4">
            <?php echo $__env->yieldContent('main_content'); ?>
        </main>
    </div>

    <?php echo $__env->yieldContent('additional_sections'); ?>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p><?php echo $__env->yieldContent('footer_text', '© 2024 My Website. All rights reserved.'); ?></p>
        </div>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/layout/master.blade.php ENDPATH**/ ?>