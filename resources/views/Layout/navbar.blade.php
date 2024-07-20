<nav class="flex items-center justify-between">
    <div class="flex items-center space-x-4">
        @auth
        <div class="relative">
            <button id="userMenuButton" class="flex items-center text-white focus:outline-none">
                <!-- User Icon -->
                <svg class="w-10 h-10 rounded-full" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </button>

            <div id="userMenu" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden transition-transform transform origin-top-left scale-95">
                <h3 class="px-4 py-2 text-white bg-gradient-to-r from-blue-700 to-purple-900 font-semibold rounded-t-md">{{ auth()->user()->name }}</h3>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Logout</button>
                </form>
            </div>


        </div>
        @endauth
    </div>
    <ul class="navbar ml-5 text-white flex space-x-4">
        <li><a href="{{ route('posts.index') }}" class="hover:text-gray-300">Home</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-gray-300">Contact</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-gray-300">About</a></li>
        @guest
        <li><a href="{{ route('login') }}" class="hover:text-gray-300">Login</a></li>
        <li><a href="{{ route('register') }}" class="hover:text-gray-300">Register</a></li>
        @endguest
    </ul>
</nav>
