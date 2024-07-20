<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Unknown Page')</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merriweather:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
<header class="bg-gradient-to-t from-blue-600 to-purple-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        @include('layout.navbar')
    </div>
</header>

<aside>
    @include('layout.sidebar')
</aside>

<main class="flex-grow m-10">
    @yield('main_content')
</main>

@yield('additional_sections')

<footer class="bg-blue-900 text-white p-4">
    <div class="container mx-auto text-center">
        <p>@yield('footer_text', '© 2024 eCommerce. All rights reserved.')</p>
    </div>
</footer>
</body>
</html>
