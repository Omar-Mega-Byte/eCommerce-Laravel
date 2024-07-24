@extends('layout.master')

@section('title')
    Register
@endsection

@section('main_content')
<div class="w-full max-w-md mx-auto mt-10">
    <h1 class="text-5xl font-extrabold font-josefin text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-500 to-blue-700 text-center mb-4 drop-shadow-lg leading-tight pb-2">
        Register
    </h1>
    <form x-data="formSubmit" @submit.prevent="submit" method="post" action="{{ route('register') }}" class=" font-merriweatherSans bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-6">
            <label class="block text-white text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('name')
                <p class="text-white text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-white text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('email')
                <p class="text-white text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-white text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input id="password" type="password" name="password" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('password')
                <p class="text-white text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-white text-sm font-bold mb-2" for="password_confirmation">
                Confirm Password
            </label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="block text-white text-sm font-bold mb-4">
            <input type="checkbox" name="subscribe" id="subscribe">
            <label for="subscribe">Subscribe to our newsletter</label>
        </div>

        <div class="flex items-center justify-between">
            <button x-ref="btn" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-700">
                Register
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const inputs = document.querySelectorAll('input');

        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.classList.add('bg-blue-100');
            });
            input.addEventListener('blur', () => {
                input.classList.remove('bg-blue-100');
            });
        });
    });
</script>
@endsection
