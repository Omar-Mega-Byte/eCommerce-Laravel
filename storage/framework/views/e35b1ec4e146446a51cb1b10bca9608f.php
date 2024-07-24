<nav class="flex items-center justify-between">
    <div class="flex items-center space-x-4">
        <?php if(auth()->guard()->check()): ?>
        <div class="relative">
            <button id="userMenuButton" class="flex items-center text-white focus:outline-none">
                <!-- User Icon -->
                <svg class="w-10 h-10 rounded-full" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </button>

            <div id="userMenu" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden transition-transform transform origin-top-left scale-95">
                <h3 class="px-4 py-2 text-white bg-gradient-to-r from-blue-700 to-purple-900 font-semibold rounded-t-md"><?php echo e(auth()->user()->name); ?></h3>
                <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Dashboard</a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Logout</button>
                </form>
            </div>


        </div>
        <?php endif; ?>
    </div>
    <ul class="text-2xl ml-5 font-ubuntuMono font-bold text-white flex space-x-4">
        <li><a href="<?php echo e(route('posts.index')); ?>" class="hover:text-gray-300">Home</a></li>
        <li><a href="<?php echo e(route('about')); ?>" class="hover:text-gray-300">About</a></li>
        <?php if(auth()->guard()->check()): ?>
            <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-gray-300">Contact</a></li>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('login')); ?>" class="hover:text-gray-300">Login</a></li>
            <li><a href="<?php echo e(route('register')); ?>" class="hover:text-gray-300">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/layout/navbar.blade.php ENDPATH**/ ?>