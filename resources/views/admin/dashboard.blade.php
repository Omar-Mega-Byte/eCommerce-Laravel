@extends('layout.master')

@section('title', 'Admin Panel')

@section('main_content')

    <!-- Sessions -->
    @if (session('add'))
        <x-flashMsg msg="{{session('add')}}"/>
    @elseif (session('delete'))
        <x-flashMsg msg="{{session('delete')}}"/>
    @elseif (session('update'))
        <x-flashMsg msg="{{session('update')}}"/>
    @endif

    <h1 class="text-3xl mt-6 mb-6">Users List</h1>
    <div class="w-full overflow-hidden rounded-lg shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 p-4">
                <thead>
                    <tr class="bg-indigo-700 text-white uppercase text-xs leading-normal">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Name</th>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Total Sales</th>
                        <th class="py-2 px-4 text-left">Orders</th>
                        <th class="py-2 px-4 text-left">Total Customers</th>
                        <th class="py-2 px-4 text-left">Type</th>
                        <th class="py-2 px-4 text-left">Email Verified At</th>
                        <th class="py-2 px-4 text-left">Created At</th>
                        <th class="py-2 px-4 text-left">Updated At</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach ($users as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-2 px-4 text-left">{{ $user->id }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->email }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->total_sales }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->orders }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->total_customers }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->type }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->email_verified_at }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->created_at }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->updated_at }}</td>
                            <td class="py-2 px-8 text-left">
                                <div class="flex space-x-3">
                                    <a class="bg-gradient-to-r from-green-400 to-green-600 text-white px-4 py-1 rounded-full hover:from-green-500 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-300" href="{{ route('users.edit', $user->id) }}">Update</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-4 py-1 rounded-full hover:from-red-500 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- User Form -->
<div class="bg-white p-6 rounded-lg shadow-lg mt-6 mb-6">
    <h2 class="text-2xl text-gray-900 mb-6">Add a New User</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 mb-2">Name</label>
            <input type="text" id="name" name="name" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="block text-gray-700 font-thin mb-2" for="password">
                Password
            </label>
            <input id="password" type="password" name="password" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="block text-gray-700 font-thin mb-2" for="password_confirmation">
                Confirm Password
            </label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Type Field -->
        <div class="mb-6">
            <label for="type" class="block text-gray-700 mb-2">Type</label>
            <input type="text" id="type" name="type" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            @error('type')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Created At Field -->
        <div class="mb-6">
            <label for="created_at" class="block text-gray-700 mb-2">Created At</label>
            <input type="datetime-local" id="created_at" name="created_at" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
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
