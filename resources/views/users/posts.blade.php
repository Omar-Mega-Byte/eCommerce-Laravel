@extends('layout.master')

@section('title')
    Posts
@endsection

@section('main_content')
<h1 class="text-3xl font-extrabold font-nunito text-blue-800 mb-5">{{$user->name}}'s Posts &#9830; {{$posts->count()}}</h1>
<div class="bg-gray-50 p-8 rounded-lg shadow-2xl mb-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
