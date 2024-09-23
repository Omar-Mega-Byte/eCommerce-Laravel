@extends('layout.master')

@section('title', 'Cart')

@section('main_content')
<div class="font-[sans-serif] bg-gradient-to-tr from-gray-200 via-gray-100 to-gray-50">
    <div class="max-w-7xl max-lg:max-w-4xl mx-auto p-6">
        <h2 class="text-2xl font-extrabold text-gray-800">Your Shopping Cart</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (!empty($cart))
            <div class="grid lg:grid-cols-3 gap-4 relative mt-8">
                <div class="lg:col-span-2 space-y-4">
                    @foreach ($cart as $id => $item)
                        <div class="p-6 bg-white shadow-md rounded-md relative">
                            <div class="flex items-center max-sm:flex-col gap-4 max-sm:gap-6">
                                <div class="w-52 shrink-0">
                                    <img src="{{ asset('storage/' . $item['image']) }}" class="w-full h-full object-contain" />
                                </div>

                                <div class="sm:border-l sm:pl-4 sm:border-gray-300 w-full">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $item['name'] }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
                                    <div class="mt-4">
                                        <span class="text-sm">Type: {{ $item['type'] }}</span><br>
                                        <span class="text-sm">Price: {{ $item['price'] }} EGP</span><br>
                                        <span class="text-sm">Quantity: {{ $item['quantity'] }}</span>
                                    </div>

                                    <hr class="border-gray-300 my-4" />

                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-white h-max rounded-md p-6 shadow-md sticky top-0">
                    <h3 class="text-xl font-bold text-gray-800">Order Summary</h3>
                    <ul class="text-gray-800 text-sm divide-y mt-4">
                        @php $total = 0 @endphp
                        @foreach ($cart as $item)
                            @php $total += $item['price'] * $item['quantity'] @endphp
                        @endforeach
                        <li class="flex flex-wrap gap-4 py-3">Total <span class="ml-auto font-bold">{{ $total }} EGP</span></li>
                    </ul>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="mt-4 text-sm px-6 py-3 w-full bg-blue-600 hover:bg-blue-700 text-white rounded-md">Checkout</button>
                    </form>

                </div>
            </div>
        @else
            <p class="text-center text-gray-700 mt-8">Your cart is empty.</p>
        @endif
    </div>
</div>
@endsection
