@extends('layout.master')

@section('title')
    Email Verification
@endsection

@section('main_content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">
            Please verify your email through the email we have sent to you!
        </h1>

        <p class="text-gray-600 mb-6">
            Didn't receive the email?
        </p>

        <form action="{{ route('verification.send') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <button class="btn bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200">
                Send Again
            </button>
        </form>
    </div>
@endsection
