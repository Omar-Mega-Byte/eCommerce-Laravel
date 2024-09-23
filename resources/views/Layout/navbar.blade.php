<div>
    @auth
        <button id="userMenuButton" class="font-righteous font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-700 mt-2 rounded-full mr-4" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </button>
        <div id="userMenu" class="absolute left-4 mt-2 w-48 border-black border-2 bg-white rounded-md shadow-lg hidden transition-transform transform origin-top-left scale-95">
            <h3 class="px-4 py-2 text-white bg-gradient-to-tr from-slate-700 to-black font-semibold">{{ auth()->user()->name }}</h3>
            @if (auth()->user()->type === 'admin')
            <a href="{{ route('admin') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Dashboard</a>
            @else
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Dashboard</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-100 transition-colors duration-300">Logout</button>
            </form>
    </div>
    @endauth
</div>
<span class="text-2xl">E-Commerce</span>
<ul  class="text-xl md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap">
    <li><a href="{{ route('posts.index') }}" class="mr-5 hover:text-gray-400">Home</a></li>
    <li><a href="{{ route('about') }}" class="mr-5 hover:text-gray-400">About</a></li>
    @auth
        <li><a href="{{ route('contact') }}" class="mr-5 hover:text-gray-400">Contact</a></li>
    @endauth
    @guest
        <li><a href="{{ route('login') }}" class="mr-5 hover:text-gray-400">Login</a></li>
        <li><a href="{{ route('register') }}" class="mr-5 hover:text-gray-400">Register</a></li>
    @endguest
</ul>
