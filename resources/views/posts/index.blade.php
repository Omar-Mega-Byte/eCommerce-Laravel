@extends('layout.master')

@section('title')
    Latest Posts
@endsection

@section('main_content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-10 rounded-lg shadow-md w-full max-w-4xl mx-4 sm:mx-0">
            <h1 class="text-4xl font-bold mb-6 text-blue-800 text-center font-merriweather">Latest Posts</h1>
            <p class="text-gray-700 text-center mb-8 font-roboto">Welcome to the Latest Posts of my website. This is a sample page content styled with cooler Tailwind CSS.</p>
            <div>
                @foreach ($posts as $post)
                    <x-postCard :post="$post" />
                @endforeach
            </div>
            <div class="mt-8">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
