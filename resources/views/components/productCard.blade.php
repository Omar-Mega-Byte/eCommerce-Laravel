@props(['product', 'full' => false, 'shop' => false])

<div class="bg-white p-4 w-64 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden border border-gray-300 hover:shadow-2xl">
    <div class="rounded-lg px-4 py-5 bg-white overflow-hidden">
        <div class="overflow-hidden rounded-lg shadow-md mb-4">
            <img class="rounded-md w-full h-40 object-cover transition-transform duration-300 hover:scale-105"
                src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/products_images/No image.jpg') }}"
                alt="{{ $product->name }}">
        </div>
        <h3 class="text-lg font-bold text-gray-800 mb-1 hover:text-blue-500 transition-colors duration-300">{{ $product->name }}</h3>
        <div class="text-gray-600 text-xs space-y-1">
            <div><span>Uploaded: {{ $product->created_at->diffForHumans() }}</span></div>
            <div><span>Type: {{ $product->type }}</span></div>
            <div class="text-green-700 font-semibold">Price: {{ $product->price }} EGP</div>
        </div>

        @if (!$full)
            <div class="mt-2 text-gray-700 text-xs">
                <p>{{ Str::words($product->description, 10) }}</p>
                <a class="text-blue-600 hover:text-blue-700 hover:underline transition-colors duration-300"
                href="{{ route('products.show', $product) }}">Read more &rarr;</a>
            </div>
        @endif

        @if ($shop)
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-3 py-1 text-sm rounded-full shadow-md mt-4 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300 flex items-center justify-center">
                    Add to Cart
                </button>
            </form>
        @endif
    </div>
    <div class="absolute bottom-3 left-3">
        {{ $slot }}
    </div>
</div>
