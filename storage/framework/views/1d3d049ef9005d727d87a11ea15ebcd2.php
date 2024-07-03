
<head>
    <!-- Other meta tags and stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<!-- HTML structure with sidebar initially hidden -->
<div id="sidebar" class="bg-gray-200 p-4 rounded-lg shadow-lg fixed top-0 right-0 h-full w-64 transform translate-x-full transition-transform duration-300 ease-in-out">
    <h2 class="text-lg font-semibold mb-4">E-commerce Links</h2>
    <ul class="space-y-2">
        <li><a href="#" class="text-blue-600 hover:underline">Shop</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Products</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Cart</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Checkout</a></li>
    </ul>
</div>

<!-- Trigger icon/button to toggle sidebar -->
<button id="sidebarToggle" class="fixed top-4 right-4 bg-gray-300 text-gray-700 p-2 rounded-md shadow-md">
    <!-- Font Awesome icon -->
    <i class="fas fa-bars"></i>
</button>

<script>
    // JavaScript to toggle sidebar visibility
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('translate-x-full');
        sidebar.classList.toggle('-translate-x-0');
        sidebarToggle.classList.toggle('active'); // Toggle active class for button
    });
</script>

<style>
    /* Additional styles for the toggle button */
    #sidebarToggle {
        transition: background-color 0.3s ease;
        /* Add any other styles as needed */
    }

    #sidebarToggle.active {
        background-color: #3182ce; /* Example color change when active */
        /* Add any other styles as needed */
    }

    /* Styling for the Font Awesome icon */
    #sidebarToggle i {
        font-size: 1.5rem; /* Adjust icon size */
        /* Add any other styles as needed */
    }
</style>
<?php /**PATH C:\xampp\htdocs\eCommerce\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>