@extends('layout.master')

@section('title', 'About Us')

@section('main_content')
<div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <!-- Introduction Section -->
    <div class="mb-16 text-center">
        <h1 class="text-5xl font-extrabold font-spinnaker text-blue-800 mb-6">About Our eCommerce Store</h1>
        <p class="text-lg text-gray-600 leading-relaxed mx-auto max-w-2xl">Welcome to our eCommerce store. Discover who we are and what drives us forward.</p>
    </div>
<!-- Mission Statement -->
<div class="flex flex-col md:flex-row items-center justify-between bg-white p-10 rounded-xl shadow-xl mb-12 transform transition hover:scale-105">
    <div class="md:w-1/2 mb-8 md:mb-0">
        <h2 class="text-4xl font-semibold text-gray-900 mb-6">Our Mission</h2>
        <p class="text-gray-700 leading-relaxed">Our mission is to revolutionize the online shopping experience by offering a diverse range of high-quality products at competitive prices. We are committed to providing exceptional customer service, fostering a sense of community, and promoting sustainable practices in everything we do. Join us on our journey to create a better, more connected world through commerce.</p>
    </div>
    <div class="md:w-1/2 flex justify-center">
        <img src="storage/images/E-Commerce-about.png" alt="Mission Image" class="rounded-lg shadow-lg w-full h-auto max-w-sm transition-transform duration-500 hover:scale-105">
    </div>
</div>


    <!-- Our Team -->
    <div class="bg-white p-10 rounded-xl shadow-xl mb-12">
        <h2 class="text-4xl font-semibold font-varelaRound text-gray-900 mb-8 text-center">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="text-center transform transition hover:scale-105">
                <img src="/storage/images/Team 1.gif" alt="Team Member 1" class="rounded-full w-28 mx-auto mb-4 shadow-lg">
                <h3 class="text-2xl font-semibold mb-2">ADEL SHAKAL</h3>
                <p class="text-gray-700">Founder & CEO</p>
            </div>
            <div class="text-center transform transition hover:scale-105">
                <img src="/storage/images/Team 3.gif" alt="Team Member 2" class="rounded-full w-28 mx-auto mb-4 shadow-lg">
                <h3 class="text-2xl font-semibold mb-2">ELSISI</h3>
                <p class="text-gray-700">Head of Operations</p>
            </div>
            <div class="text-center transform transition hover:scale-105">
                <img src="/storage/images/Team 2.gif" alt="Team Member 3" class="rounded-full w-28 mx-auto mb-4 shadow-lg">
                <h3 class="text-2xl font-semibold mb-2">OMAR AHMED</h3>
                <p class="text-gray-700">Marketing Manager</p>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-white p-10 rounded-xl shadow-xl">
        <h2 class="text-4xl font-semibold text-gray-900 mb-8 text-center">Contact Us</h2>
        <div class="flex flex-col md:flex-row items-center justify-center">
            <div class="md:w-1/2 md:mr-10 mb-8 md:mb-0">
                <p class="text-gray-700 leading-relaxed mb-6">Have questions or feedback? Reach out to us!</p>
                <ul class="list-disc pl-5 text-gray-700">
                    <li class= mb-2">Email: <a href="mailto:contact@example.com" class="text-blue-500 hover:underline">contact@example.com</a></li>
                    <li class= mb-2">Phone: +1234567890</li>
                    <li class= mb-2">Address: 123 Street, City, Country</li>
                    <li><a class= text-blue-500 hover:underline" href="{{route('contact')}}">Contact us</a></li>
                </ul>
            </div>
            <div class="md:w-1/2">
                <img src="storage/images/contact-us-5731121.png" alt="Contact Image" class="rounded-lg shadow-lg transition-transform duration-500 hover:scale-105">
            </div>
        </div>
    </div>
</div>
@endsection
