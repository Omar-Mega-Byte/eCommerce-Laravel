@props(['user'])
@extends('layout.master')

@section('title')
    User {{$user->id}}
@endsection

@section('main_content')
<div class="bg-white p-6 rounded-lg shadow-lg mt-6 mb-6">
    <a href="{{route('admin')}}" class="text-blue-500 hover:text-blue-700 transition duration-300 mb-4 inline-block">&larr; Return to Dashboard</a>
    <h2 class="text-2xl text-gray-900 mb-6">Update User</h2>
    <form action="{{ route('users.update' ,$user) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 mb-2">Name</label>
            <input type="text" value="{{$user->name}}" id="name" name="name" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" value="{{$user->email}}" id="email" name="email" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Type Field -->
        <div class="mb-6">
            <label for="type" class="block text-gray-700 mb-2">Type</label>
            <input type="text"  value="{{$user->type}}" id="type" name="type" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('type')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Created At Field -->
        <div class="mb-6">
            <label for="created_at" class="block text-gray-700 mb-2">Created At</label>
            <input type="datetime"  value="{{$user->created_at}}" id="created_at" name="created_at" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('created_at')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg shadow-lg transition duration-300">Submit</button>
        </div>
    </form>
</div>
@endsection
