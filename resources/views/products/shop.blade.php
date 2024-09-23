@extends('layout.master')

@section('title')
    Shop
@endsection

@section('main_content')
<div class="bg-gray-50 p-8 rounded-lg shadow-2xl mb-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-6xl mx-auto">
        <!-- Page Title -->
        <h1 class="text-6xl font-extrabold mb-12 text-blue-900 text-center">Our Shop</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center">
                @foreach ($products as $product)
                    <x-productCard :shop="true" :product="$product"/>
                @endforeach
        </div>
        <div class="mt-8">
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection
