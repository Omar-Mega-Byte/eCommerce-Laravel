<?php $__env->startSection('title', 'About Us'); ?>

<?php $__env->startSection('main_content'); ?>
<div class="container mx-auto py-12">
    <!-- Introduction Section -->
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-extrabold text-blue-800 mb-4">About Our eCommerce Store</h1>
        <p class="text-gray-600 leading-relaxed mx-auto max-w-3xl">Welcome to our eCommerce store. Discover who we are and what drives us forward.</p>
    </div>

    <!-- Mission Statement -->
    <div class="flex flex-col md:flex-row items-center justify-between bg-white p-8 rounded-lg shadow-lg mb-8">
        <div class="md:w-1/2 mb-4 md:mb-0">
            <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Mission</h2>
            <p class="text-gray-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero sit amet varius lacinia. Mauris sed est sed libero feugiat feugiat nec eget sem.</p>
        </div>
        <div class="md:w-1/2">
            <img src="https://source.unsplash.com/800x600/?mission" alt="Mission Image" class="rounded-lg shadow-lg">
        </div>
    </div>

    <!-- Our Team -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6 text-center">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="text-center">
                <img src="https://source.unsplash.com/400x400/?team" alt="Team Member 1" class="rounded-full w-24 mx-auto mb-4 shadow-lg">
                <h3 class="text-xl font-semibold mb-2">John Doe</h3>
                <p class="text-gray-700">Founder & CEO</p>
            </div>
            <div class="text-center">
                <img src="https://source.unsplash.com/400x400/?team" alt="Team Member 2" class="rounded-full w-24 mx-auto mb-4 shadow-lg">
                <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
                <p class="text-gray-700">Head of Operations</p>
            </div>
            <div class="text-center">
                <img src="https://source.unsplash.com/400x400/?team" alt="Team Member 3" class="rounded-full w-24 mx-auto mb-4 shadow-lg">
                <h3 class="text-xl font-semibold mb-2">Alice Brown</h3>
                <p class="text-gray-700">Marketing Manager</p>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6 text-center">Contact Us</h2>
        <div class="flex flex-col md:flex-row items-center justify-center">
            <div class="md:w-1/2 md:mr-8 mb-4 md:mb-0">
                <p class="text-gray-700 leading-relaxed">Have questions or feedback? Reach out to us!</p>
                <ul class="list-disc pl-5 mt-4 text-gray-700">
                    <li>Email: <a href="mailto:contact@example.com" class="text-blue-500 hover:underline">contact@example.com</a></li>
                    <li>Phone: +1234567890</li>
                    <li>Address: 123 Street, City, Country</li>
                    <li><a class="text-blue-400" href="<?php echo e(route('contact')); ?>">Contact us</a></li>
                </ul>
            </div>
            <div class="md:w-1/2">
                <img src="https://source.unsplash.com/800x600/?contact" alt="Contact Image" class="rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/pages/about.blade.php ENDPATH**/ ?>