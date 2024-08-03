@props(['product', 'full' => false])

<!-- Product Card -->
<div class="relative bg-white p-6 rounded-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden break-words">
    <!-- Product Content Wrapper -->
    <div class="rounded-xl mb-8 px-6 py-10 bg-white overflow-hidden break-words">
        <!-- Cover Photo -->
        <div class="overflow-hidden">
            @if ($product->image)
                <img class="rounded-lg mb-6 w-80 h-72 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <img class="rounded-lg mb-6 w-full h-48 object-cover" src="{{ asset('storage/products_images/No image.jpg') }}" alt="{{ $product->name }}">
            @endif
        </div>
        <!-- product Title -->
        <h3 class="text-3xl font-bold text-gray-900">{{ $product->name}}</h3>
        <!-- product Metadata -->
        <div class="text-gray-500">
            <span class="">Uploded: {{ $product->created_at->diffForHumans() }} </span>
        </div>
        <div class="text-gray-500">
            <span class="">Type: {{$product->type}}</span>
        </div>
        <div class="text-gray-500 mb-2">
            <span class="">Price:{{$product->price}} EGP</span>
        </div>
        <!-- product Body -->
        @if ($full)
            <div>
                <span class="text-gray-700
        @else
            <div>
                <span class="text-gray-700">{{ Str::words($product->description, 20) }}</span>
                <a class="text-blue-400 hover:underline" href="{{ route('products.show', $product) }}">Read more &rarr;</a>
            </div>
        @endif
    </div>

    <!-- Slot for additional content -->
    <div class="absolute bottom-4 right-4">
        {{ $slot }}
    </div>
</div>
