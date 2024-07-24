@extends('layout.master')

@section('title')
    Post {{$post->id}}
@endsection

@section('main_content')
    <div class="min-h-screen bg-gray-100 p-4">
        <x-postCard :post="$post" full="true"/>
    </div>
@endsection
