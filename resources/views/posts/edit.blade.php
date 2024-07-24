@extends('layout.master')

@section('title')
    Post {{$post->id}}
@endsection

@section('main_content')
<!-- Posts Form -->
<div class="bg-white p-8 rounded-xl shadow-md mb-8">
    <a href="{{route('dashboard')}}" class="text-blue-500 hover:text-blue-700 transition duration-300 mb-4 inline-block">&larr; Return to Dashboard</a>
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Update the Post</h2>
    <form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Title Field -->
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{$post->title}}" class="block w-full mt-1 p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
            @error('title')
                <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Body Field -->
        <div class="mb-6">
            <label for="body" class="block text-gray-700 font-medium mb-2">Body</label>
            <textarea id="body" name="body" class="block w-full mt-1 p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500" rows="6">{{$post->body}}</textarea>
            @error('body')
                <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Current Cover photo if exist --}}
        <div class="overflow-hidden">
            @if ($post->image)
                <label class="block text-gray-700 font-medium mb-2">Cover Photo</label>
                <img class="rounded-lg mb-6 w-1/2 h-64 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            @endif
        </div>

        {{-- post image --}}
        <div class="mb-4">
            <label for="image">Cover photo</label>
            <input type="file" name="image" id="image">
        </div>

        @error('image')
            <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
        @enderror

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">Update</button>
        </div>
    </form>
</div>
@endsection
