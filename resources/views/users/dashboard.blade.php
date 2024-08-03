@props(['post', 'full' => false])
@extends('layout.master')

@section('title', 'E-commerce Dashboard')

@section('main_content')
<div class="container mx-auto">
    <!-- Welcome Section -->
    <div class="mb-10">
        <h1 class="text-3xl text-blue-800">Welcome, {{ auth()->user()->name }}</h1>
        <p class="text-gray-600">You have {{$posts->total()}} posts</p>
        <p class="text-gray-600">Here's an overview of your eCommerce activities.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-400 to-blue-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <h2 class="text-lg">Total Sales</h2>
            <p class="text-2xl">$<span id="totalSales">{{auth()->user()->total_sales}}</span></p>
            <div x-show="tooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 right-0 bottom-full mb-2">Total revenue generated</div>
        </div>
        <div class="bg-gradient-to-r from-green-400 to-green-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <h2 class="text-lg">New Orders</h2>
            <p class="text-2xl"><span id="newOrders">{{auth()->user()->orders}}</span></p>
            <div x-show="tooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 right-0 bottom-full mb-2">Orders received today</div>
        </div>
        <div class="bg-gradient-to-r from-purple-400 to-purple-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <h2 class="text-lg">Total Customers</h2>
            <p class="text-2xl"><span id="totalCustomers">{{auth()->user()->total_customers}}</span></p>
            <div x-show="tooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 right-0 bottom-full mb-2">Number of registered customers</div>
        </div>
    </div>

    <!-- Sessions -->
    @if (session('success'))
        <x-flashMsg msg="{{session('success')}}"/>
    @elseif (session('delete'))
        <x-flashMsg msg="{{session('delete')}}"/>
    @elseif (session('update'))
        <x-flashMsg msg="{{session('update')}}"/>
    @endif

<!-- Posts Form -->
<div class="bg-white p-6 rounded-lg shadow-lg mb-6">
    <h2 class="text-2xl text-gray-900 mb-6">Create a New Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Title Field -->
        <div class="mb-6">
            <label for="title" class="block text-gray-700 mb-2">Title</label>
            <input type="text" id="title" name="title" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('title')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Body Field -->
        <div class="mb-6">
            <label for="body" class="block text-gray-700 mb-2">Body</label>
            <textarea id="body" name="body" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" rows="5"></textarea>
            @error('body')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Post Image -->
        <div class="mb-4">
            <label for="image">Cover photo</label>
            <input type="file" name="image" id="image">
        </div>

        @error('image')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg shadow-lg transition duration-300">Submit</button>
        </div>
    </form>
</div>

<!-- Latest Posts -->
<div class="bg-gray-50 p-8 rounded-lg shadow-2xl mb-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl mx-auto">
        <!-- Page Title -->
        <h1 class="text-6xl mb-12 text-blue-900 text-center">Your Posts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($posts as $post)
                <!-- Post Card -->
                <div class="relative bg-white p-6 rounded-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden break-words">
                    <!-- Post Content Wrapper -->
                    <div class="rounded-xl mb-8 px-6 py-10 bg-white overflow-hidden break-words">
                        <!-- Cover Photo -->
                        <div class="overflow-hidden">
                            @if ($post->image)
                                <img class="rounded-lg mb-6 w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            @else
                                <img class="rounded-lg mb-6 w-full h-48 object-cover" src="{{ asset('storage/posts_images/No image.jpg') }}" alt="{{ $post->title }}">
                            @endif
                        </div>
                        <!-- Post Title -->
                        <h3 class="text-2xl text-gray-900">{{ $post->title }}</h3>
                        <!-- Post Metadata -->
                        <div class="text-xs text-gray-500 mb-4">
                            <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
                            <a class="text-blue-700 hover:underline" href="{{ route('posts.users', $post->user) }}">{{ $post->user->name }}</a>
                        </div>
                        <span class="text-gray-700">{{ Str::words($post->body, 20) }}</span>
                        <a class="text-blue-400 hover:underline" href="{{ route('posts.show', $post) }}">Read more &rarr;</a>
                    </div>
                    <!-- Update and Delete Buttons -->
                    <div class="absolute bottom-4 right-4 flex space-x-2">
                        <a class="bg-gradient-to-r from-green-400 to-green-600 text-white px-5 py-3 rounded-full hover:from-green-500 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-300" href="{{ route('posts.edit', $post) }}">Update</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-3 rounded-full hover:from-red-500 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-300">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>

<!-- Recent Orders Table -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <h2 class="text-lg text-gray-800 mb-4">Recent Orders</h2>
    <table class="min-w-full bg-white">
    </table>
</div>

<!-- Top Products and Customer List -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <h2 class="text-lg text-gray-800 mb-4">Top Products</h2>
    <ul class="list-disc pl-5 space-y-2">
    </ul>
</div>

<div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg text-gray-800 mb-4">Customer List</h2>
    <table class="min-w-full bg-white">
    </table>
</div>

<section class="bg-white rounded-lg shadow mt-6">
    <div class="container py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl title-font mb-2 text-gray-900">Pricing Plans</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Choose the plan that best suits your needs. Each plan comes with a variety of features designed to help you scale your business efficiently.</p>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Plan</th>
                        <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">Speed</th>
                        <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">Storage</th>
                        <th class="px-4 py-3 title-font tracking-wider text-gray-900 text-sm bg-gray-100">Price</th>
                        <th class="w-10 title-font tracking-wider text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-3">Starter</td>
                        <td class="px-4 py-3">10 Mb/s</td>
                        <td class="px-4 py-3">50 GB</td>
                        <td class="px-4 py-3 text-lg text-gray-900">$10/month</td>
                        <td class="w-10 text-center">
                            <input name="plan" type="radio">
                        </td>
                    </tr>
                    <tr>
                        <td class="border-t-2 border-gray-200 px-4 py-3">Professional</td>
                        <td class="border-t-2 border-gray-200 px-4 py-3">50 Mb/s</td>
                        <td class="border-t-2 border-gray-200 px-4 py-3">200 GB</td>
                        <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">$25/month</td>
                        <td class="border-t-2 border-gray-200 w-10 text-center">
                            <input name="plan" type="radio">
                        </td>
                    </tr>
                    <tr>
                        <td class="border-t-2 border-gray-200 px-4 py-3">Business</td>
                        <td class="border-t-2 border-gray-200 px-4 py-3">100 Mb/s</td>
                        <td class="border-t-2 border-gray-200 px-4 py-3">500 GB</td>
                        <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">$50/month</td>
                        <td class="border-t-2 border-gray-200 w-10 text-center">
                            <input name="plan" type="radio">
                        </td>
                    </tr>
                    <tr>
                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">Enterprise</td>
                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">1 Gb/s</td>
                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">1 TB</td>
                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">$100/month</td>
                        <td class="border-t-2 border-b-2 border-gray-200 w-10 text-center">
                            <input name="plan" type="radio">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
            <a href="#" class="text-purple-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <button class="flex ml-auto text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded">Sign Up</button>
        </div>
    </div>
</section>

@endsection
