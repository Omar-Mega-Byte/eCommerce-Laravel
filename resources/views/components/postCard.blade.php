@props(['post'])

<div class="bg-white shadow-md rounded-lg mb-6 transition-transform transform hover:scale-105 hover:shadow-lg px-6 py-4">
    <h3 class="text-xl font-semibold text-gray-900 font-sans">{{ $post->title }}</h3>
    <div class="text-xs text-gray-500 mb-4 font-roboto">
        <span>Posted {{$post->created_at->diffForHumans()}} by </span>
        <a class="text-blue-600 hover:underline" href="{{Route('posts.users',$post->user)}}">{{ $post->user->name }}</a>
    </div>
    <p class="text-gray-600 font-roboto">{{ Str::words($post->body, 20, '...') }}</p>
</div>
