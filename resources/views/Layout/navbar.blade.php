<nav class="container mx-auto px-4 flex items-center justify-between">
    <div class="flex items-center space-x-4">

<a href="{{ route('Home') }}" class="flex items-center text-white hover:text-gray-300">
    <div class="rounded-full overflow-hidden h-7 w-7 flex items-center justify-center bg-gray-700">
        <img src="https://i.gifer.com/PYBr.gif" alt="Cool Logo" class="h-16 w-auto object-cover">
    </div>
</a>

        <ul class="navbar text-white flex space-x-4">
            <li><a href="{{ route('Home') }}" class="hover:text-gray-300">Home</a></li>
            <li><a href="{{ route('Contact') }}" class="hover:text-gray-300">Contact</a></li>
            <li><a href="{{ route('About') }}" class="hover:text-gray-300">About</a></li>
        </ul>
    </div>

    <button id="menuToggle" class="lg:hidden text-white focus:outline-none">
        <i class="fas fa-bars"></i>
    </button>
</nav>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const navbar = document.querySelector('.navbar');

    menuToggle.addEventListener('click', () => {
        navbar.classList.toggle('hidden');
    });
</script>

