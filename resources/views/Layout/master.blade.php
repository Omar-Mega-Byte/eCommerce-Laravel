<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Unknown Page')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-blue-950 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="text-2xl font-bold">eCommerce</div>
            @include('layout.navbar')
        </div>
    </header>

    <div class="container mx-auto flex flex-wrap px-4 py-8">
        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 mb-8 md:mb-0">
            @include('layout.sidebar')
        </aside>

        <main class="w-full md:w-3/4">
            @yield('main_content')
        </main>
    </div>

    @yield('additional_sections')

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>@yield('footer_text', '© 2024 My Website. All rights reserved.')</p>
        </div>
    </footer>
</body>
</html>
