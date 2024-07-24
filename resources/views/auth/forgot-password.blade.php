@extends('layout.master')

@section('title')
    Forgot Password
@endsection

@section('main_content')
<div class="w-full max-w-md mx-auto mt-10">
    <h1 class="text-5xl font-extrabold font-josefin text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-500 to-blue-700 text-center mb-4 drop-shadow-lg leading-tight pb-2">
        Forgot Password
    </h1>

    {{-- Session Messages --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif

    <form action="{{ route('password.request') }}" method="post" class="font-merriweatherSans bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 shadow-xl rounded-lg px-8 pt-10 pb-8 mb-8" x-data="formSubmit" @submit.prevent="submit">
        @csrf

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-white text-sm font-bold mb-2">Email</label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') ring-red-500 @enderror">
            @error('email')
                <p class="text-white text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <div class="flex items-center justify-between">
            <button x-ref="btn" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-700">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
