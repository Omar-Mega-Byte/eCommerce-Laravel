<head>
    <!-- Other meta tags and stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" integrity="sha512-..." crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Sidebar initially hidden -->
    <div id="sidebar" class="fixed border-white border-4 top-0 right-0 h-full w-64 bg-gradient-to-l from-blue-400 to-purple-600 text-white p-6 transform translate-x-full transition-transform duration-300 ease-in-out shadow-lg rounded-l-lg z-50">
        <h2 class="text-xl font-semibold mb-6">E-commerce Links</h2>
        <ul class="space-y-4 font-inconsolata font-bold">
            <li><a href="#" class="text-white hover:text-gray-300">Shop</a></li>
            <li><a href="#" class="text-white hover:text-gray-300">Products</a></li>
            <li><a href="#" class="text-white hover:text-gray-300">Cart</a></li>
            <li><a href="#" class="text-white hover:text-gray-300">Checkout</a></li>
        </ul>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>

    <!-- Trigger icon/button to toggle sidebar -->
    <button id="sidebarToggle" class="fixed border-white border-2 top-4 right-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white p-3 rounded-3xl shadow-md focus:outline-none transition-transform duration-300 ease-in-out" style="z-index: 9999;">
        <!-- Font Awesome icon -->
        <i class="fas fa-bars"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const sidebarToggle = document.getElementById('sidebarToggle');

            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('translate-x-full');
                overlay.classList.toggle('hidden');
            });

            overlay.addEventListener('click', function () {
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('hidden');
            });
        });
    </script>
</body>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>