@extends('layout.master')

@section('title')
    Product {{$product->id}}
@endsection

@section('main_content')
    <div class="min-h-screen bg-gray-100 p-4">
        <x-productCard :product="$product" full="true"/>
    </div>
@endsection
