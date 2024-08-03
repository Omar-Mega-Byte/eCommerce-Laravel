@props(['post', 'full' => false])

<!-- Post Card -->
<div class="relative bg-white p-6 rounded-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden break-words">
    <!-- Post Content Wrapper -->
    <div class="rounded-xl mb-8 px-6 py-10 bg-white overflow-hidden break-words">
        <!-- Cover Photo -->
        <div class="overflow-hidden">
            @if ($post->image)
                <img class="rounded-lg mb-6 w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            @else
                <img class="rounded-lg mb-6 w-full h-48 object-cover" src="{{ asset('storage/posts_images/No image.jpg') }}" alt="{{ $post->title }}">
            @endif
        </div>
        <!-- Post Title -->
        <h3 class="text-2xl font-bold text-gray-900">{{ $post->title }}</h3>
        <!-- Post Metadata -->
        <div class="text-xs text-gray-500 mb-4">
            <span class="font-shadowsIntoLight">Posted {{ $post->created_at->diffForHumans() }} by </span>
            <a class="text-blue-700 hover:underline" href="{{ route('posts.users', $post->user) }}">{{ $post->user->name }}</a>
        </div>
        <!-- Post Body -->
        @if ($full)
            <div>
                <span class="text-gray-700">{{ $post->body }}</span>
            </div>
        @else
            <div>
                <span class="text-gray-700">{{ Str::words($post->body, 20) }}</span>
                <a class="text-blue-400 hover:underline" href="{{ route('posts.show', $post) }}">Read more &rarr;</a>
            </div>
        @endif
    </div>

    <!-- Slot for additional content -->
    <div class="absolute bottom-4 right-4">
        {{ $slot }}
    </div>
</div>
