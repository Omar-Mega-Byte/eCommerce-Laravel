<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Unknown Page')</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Arvo&family=Bebas+Neue&family=Cabin&family=Catamaran&family=Comfortaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Dancing+Script&family=EB+Garamond&family=Exo+2&family=Fira+Sans&family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Hind&family=Inconsolata&family=Josefin+Sans:wght@400;700&family=Karla&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Libre+Franklin&family=Lobster&family=Merriweather:wght@400;700&family=Merriweather+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Mulish&family=Nanum+Gothic&family=Nunito:wght@400;700&family=Old+Standard+TT&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Open+Sans+Condensed:300&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Play&family=Playfair+Display:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Rakkas&family=Raleway:wght@400;700&family=Righteous&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&family=Russo+One&family=Shadows+Into+Light&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spectral&family=Spinnaker&family=Teko&family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&family=Ubuntu+Mono&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&family=Yanone+Kaffeesatz&family=Zilla+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
<header class="bg-gradient-to-t from-blue-600 to-blue-500 p-4">
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

<footer class="bg-gradient-to-t from-blue-600 to-blue-500 text-white p-4">
    <div class="container mx-auto text-center">
        <p>@yield('footer_text', '© 2024 eCommerce. All rights reserved.')</p>
    </div>
</footer>
<script>
    // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
    document.addEventListener('alpine:init', () => {
        Alpine.data('formSubmit', () => ({
            submit() {
                this.$refs.btn.disabled = true;
                this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                this.$refs.btn.classList.add('bg-indigo-400');
                this.$refs.btn.innerHTML =
                    `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                    <i class="fa-solid fa-spinner animate-spin"></i>
                    </span>Please wait...`;

                this.$el.submit()
            }
        }))
    })
</script>

</body>
</html>
