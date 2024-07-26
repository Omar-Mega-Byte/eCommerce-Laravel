@extends('layout.master')

@section('title')
    Our Products
@endsection

@section('main_content')
<div class="bg-gray-50 p-8 rounded-lg shadow-2xl mb-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl mx-auto">
        <!-- Page Title -->
        <h1 class="text-6xl font-extrabold mb-12 text-blue-900 text-center font-oswald">Our Products</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($products as $product)
                    <x-productCard :product="$product"/>
                @endforeach
        </div>
        <div class="mt-8">
            {{$products->links()}}
        </div>
        </div>
</div>
@endsection
