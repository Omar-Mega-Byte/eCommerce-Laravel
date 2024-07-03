<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title','Unknown Page'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body>
    <header>
        <nav>
            <?php echo $__env->make('/layout/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>
    </header>
    <main>
        <?php echo $__env->yieldContent('main'); ?>
        <?php echo $__env->make('/layout/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/components/layout.blade.php ENDPATH**/ ?>