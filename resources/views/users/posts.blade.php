@extends('layout.master')

@section('title')
    Posts
@endsection

@section('main_content')
    <h1 class="text-3xl font-extrabold text-blue-800 mb-5">{{$user->name}}'s Posts &#9830; {{$posts->count()}}</h1>
    <div>
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>
    <div class="mt-8">
        {{$posts->links()}}
    </div>
@endsection
