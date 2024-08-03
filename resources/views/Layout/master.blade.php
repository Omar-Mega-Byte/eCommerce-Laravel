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
    <link rel="icon" href="{{ asset('storage/images/eCommerce icon.jpeg') }}">
            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
<header class="text-gray-600 font-righteous">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center font-semibold font-righteous">
        @include('layout.navbar')
    </div>
</header>

<aside class="font-semibold font-righteous">
    @include('layout.sidebar')
</aside>

<main class="font-thin font-righteous flex-grow m-10">
    @yield('main_content')
</main>

@yield('additional_sections')

<footer class="font-righteous ml-16 text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
      <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full" viewBox="0 0 24 24">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
          </svg>
          <span class="ml-3 text-xl">E-Shop</span>
        </a>
        <p class="mt-2 text-sm text-gray-500">Your one-stop shop for everything you need</p>
      </div>
      <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">SHOP</h2>
          <nav class="list-none mb-10">
            <li>
              <a class="text-gray-600 hover:text-gray-800">Men's Clothing</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Women's Clothing</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Kids' Clothing</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Accessories</a>
            </li>
          </nav>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">HELP</h2>
          <nav class="list-none mb-10">
            <li>
              <a class="text-gray-600 hover:text-gray-800">Shipping Info</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Returns & Exchanges</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">FAQs</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Contact Us</a>
            </li>
          </nav>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">ABOUT</h2>
          <nav class="list-none mb-10">
            <li>
              <a class="text-gray-600 hover:text-gray-800">Our Story</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Careers</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Sustainability</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Press</a>
            </li>
          </nav>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CONNECT</h2>
          <nav class="list-none mb-10">
            <li>
              <a class="text-gray-600 hover:text-gray-800">Blog</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Newsletter</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Instagram</a>
            </li>
            <li>
              <a class="text-gray-600 hover:text-gray-800">Facebook</a>
            </li>
          </nav>
        </div>
      </div>
    </div>
    <div class="bg-gray-100">
      <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
        <p class="text-gray-500 text-sm text-center sm:text-left">© 2024 E-Shop —
          <a href="https://github.com/Omar-Mega-Byte" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@OmarAhmed</a>
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
          <a class="text-gray-500">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
              <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </a>
        </span>
    </div>
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
