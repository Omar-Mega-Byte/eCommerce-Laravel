<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Unknown Page')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-blue-900 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="text-3xl font-extrabold hover:text-yellow-400 transition duration-300">eCommerce</div>
            @include('layout.navbar')
        </div>
    </header>

    <div class="container mx-auto flex flex-wrap px-6 py-10">
        <aside class="w-full md:w-1/4 mb-10 md:mb-0">
            @include('layout.sidebar')
        </aside>

        <main class="w-full md:w-3/4 mx-20 md:mx-0">
            @yield('main_content')
        </main>
    </div>

    @yield('additional_sections')

    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p>@yield('footer_text', '© 2024 My Website. All rights reserved.')</p>
        </div>
    </footer>
</body>
</html>
