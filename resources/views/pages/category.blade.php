@extends('layout/master')
@section('title')
    Category
@endsection
@section('main')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold">{{$page_name}}</h1>
    <p class="mt-4 text-gray-700">{{$page_description}}</p>
</div>
@endsection
@section('sidebar')
    @parent
    This is sidebar from Category
@endsection
