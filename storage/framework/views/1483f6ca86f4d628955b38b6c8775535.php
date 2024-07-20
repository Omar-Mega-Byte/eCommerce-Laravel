<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Unknown Page'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merriweather:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
<header class="bg-gradient-to-t from-blue-600 to-purple-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header>

<aside>
    <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</aside>

<main class="flex-grow m-10">
    <?php echo $__env->yieldContent('main_content'); ?>
</main>

<?php echo $__env->yieldContent('additional_sections'); ?>

<footer class="bg-blue-900 text-white p-4">
    <div class="container mx-auto text-center">
        <p><?php echo $__env->yieldContent('footer_text', '© 2024 eCommerce. All rights reserved.'); ?></p>
    </div>
</footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/layout/master.blade.php ENDPATH**/ ?>