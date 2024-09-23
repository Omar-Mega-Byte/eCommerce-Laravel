@extends('layout.master')

@section('title')
    Latest Posts
@endsection

@section('main_content')
<div class=" mb-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl mx-auto">
        <!-- Page Title -->
        <h1 class="text-6xl font-bold mb-12 text-blue-900 text-center">Latest Posts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($posts as $post)
                    <x-postCard :post="$post"/>
                @endforeach
        </div>
        <div class="mt-8">
            {{$posts->links()}}
        </div>
        </div>
</div>
@endsection
