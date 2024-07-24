@extends('layout.master')

@section('title')
    Login
@endsection

@section('main_content')
<div class="w-full max-w-md mx-auto mt-10">
    <h1 class="text-5xl font-extrabold font-josefin text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-500 to-blue-700 text-center mb-4 drop-shadow-lg leading-tight pb-2">
        Login
    </h1>
    <form method="post" action="{{ route('login') }}" class="font-merriweatherSans  bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 shadow-xl rounded-lg px-8 pt-10 pb-8 mb-8">
        @csrf
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('email')
                <p class="text-white text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input id="password" type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('password')
                <p class="text-white text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label class="text-white" for="remember">Remember Me</label>
            </div>
            <a class="text-white" href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
        @error('failed')
            <p class="text-white font-bold text-xs italic mt-2">{{ $message }}</p>
        @enderror


        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-700">
                Login
            </button>
        </div>
    </form>
</div>
@endsection
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

