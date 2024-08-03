@extends('layout.master')

@section('title')
    {{ $page_name }}
@endsection

@section('main_content')
@if (session('success'))
<div>
    <p class="text-green-500 font-bold mb-5">
        <x-flashMsg msg="{{session('success')}}"/></p>
</div>
@endif

<!-- Contact Us Form -->
<div class="bg-white p-6 rounded-lg shadow-lg mb-6">
<h2 class="text-2xl font-semibold text-gray-900 mb-6">Contact Us!</h2>
<form action="{{ route('contacts.store') }}" method="POST">
    @csrf

<!-- NameField -->
<div class="mb-6">
    <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
    <input type="text" id="name" name="name" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
    @error('name')
        <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-6">
    <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
    <input type="text" id="email" name="email" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
    @error('email')
        <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Message Field -->
<div class="mb-6">
    <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
    <textarea id="message" name="message" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" rows="5"></textarea>
    @error('message')
        <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">Submit</button>
    </div>
</form>
</div>
@endsection
