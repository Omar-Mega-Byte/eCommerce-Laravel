@extends('layout.master')

@section('title', 'E-commerce Dashboard')

@section('main_content')
<div class="container mx-auto">
    <!-- Welcome Section -->
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-blue-800">Welcome, {{ auth()->user()->name }}</h1>
        <p class="text-gray-600">Here's an overview of your eCommerce activities.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-400 to-blue-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" x-data="{ tooltip: false }" @mouseover="tooltip = true" @mouseleave="tooltip = false">
            <h2 class="text-lg font-semibold">Total Sales</h2>
            <p class="text-2xl font-bold">$<span id="totalSales">123,456.78</span></p>
            <div x-show="tooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 right-0 bottom-full mb-2">Total revenue generated</div>
        </div>
        <div class="bg-gradient-to-r from-green-400 to-green-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" x-data="{ tooltip: false }" @mouseover="tooltip = true" @mouseleave="tooltip = false">
            <h2 class="text-lg font-semibold">New Orders</h2>
            <p class="text-2xl font-bold"><span id="newOrders">150</span></p>
            <div x-show="tooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 right-0 bottom-full mb-2">Orders received today</div>
        </div>
        <div class="bg-gradient-to-r from-purple-400 to-purple-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" x-data="{ tooltip: false }" @mouseover="tooltip = true" @mouseleave="tooltip = false">
            <h2 class="text-lg font-semibold">Total Customers</h2>
            <p class="text-2xl font-bold"><span id="totalCustomers">1,234</span></p>
            <div x-show="tooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 right-0 bottom-full mb-2">Number of registered customers</div>
        </div>
    </div>

    @if (session('success'))
    <div>
        <p class="text-green-500 font-bold mb-5">
            <x-flashMsg msg="{{session('success')}}"/></p>
    </div>
@endif

<!-- Posts Form -->
<div class="bg-white p-6 rounded-lg shadow-lg mb-6">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Create a New Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <!-- Title Field -->
    <div class="mb-6">
        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
        <input type="text" id="title" name="title" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
        @error('title')
            <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <!-- Body Field -->
    <div class="mb-6">
        <label for="body" class="block text-gray-700 font-medium mb-2">Body</label>
        <textarea id="body" name="body" class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" rows="5"></textarea>
        @error('body')
            <p class="text-red-500 font-bold text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">Submit</button>
        </div>
    </form>
</div>

<!-- Latest Posts -->
<div class="mb-4">
    <h1 class="text-3xl font-extrabold text-blue-800 mb-5">Your Latest Posts</h1>
    <div>
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    <div class="mt-8">
        {{$posts->links()}}
    </div>
</div>


<!-- Sales Chart -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Sales Chart</h2>
    <canvas id="salesChart"></canvas>
</div>

<!-- Recent Orders Table -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">Order ID</th>
                <th class="py-2 px-4 border-b border-gray-200">Customer</th>
                <th class="py-2 px-4 border-b border-gray-200">Total</th>
                <th class="py-2 px-4 border-b border-gray-200">Status</th>
                <th class="py-2 px-4 border-b border-gray-200">Date</th>
                <th class="py-2 px-4 border-b border-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">1234</td>
                <td class="py-2 px-4 border-b border-gray-200">John Doe</td>
                <td class="py-2 px-4 border-b border-gray-200">$123.45</td>
                <td class="py-2 px-4 border-b border-gray-200">Shipped</td>
                <td class="py-2 px-4 border-b border-gray-200">2024-07-01</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800" @click="openModal('1234')">View</button>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">1235</td>
                <td class="py-2 px-4 border-b border-gray-200">Jane Smith</td>
                <td class="py-2 px-4 border-b border-gray-200">$67.89</td>
                <td class="py-2 px-4 border-b border-gray-200">Processing</td>
                <td class="py-2 px-4 border-b border-gray-200">2024-07-01</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800" @click="openModal('1235')">View</button>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">1236</td>
                <td class="py-2 px-4 border-b border-gray-200">Alice Brown</td>
                <td class="py-2 px-4 border-b border-gray-200">$234.56</td>
                <td class="py-2 px-4 border-b border-gray-200">Delivered</td>
                <td class="py-2 px-4 border-b border-gray-200">2024-07-01</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800" @click="openModal('1236')">View</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<!-- Top Products -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Top Products</h2>
    <ul class="list-disc pl-5 space-y-2">
        <li class="text-gray-600">Product A - 100 sales</li>
        <li class="text-gray-600">Product B - 90 sales</li>
        <li class="text-gray-600">Product C - 80 sales</li>
        <li class="text-gray-600">Product D - 70 sales</li>
        <li class="text-gray-600">Product E - 60 sales</li>
    </ul>
</div>

<!-- Customer List -->
<div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Customer List</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">Name</th>
                <th class="py-2 px-4 border-b border-gray-200">Email</th>
                <th class="py-2 px-4 border-b border-gray-200">Joined</th>
                <th class="py-2 px-4 border-b border-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">John Doe</td>
                <td class="py-2 px-4 border-b border-gray-200">john.doe@example.com</td>
                <td class="py-2 px-4 border-b border-gray-200">2024-06-01</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800" @click="openModal('john.doe@example.com')">View</button>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">Jane Smith</td>
                <td class="py-2 px-4 border-b border-gray-200">jane.smith@example.com</td>
                <td class="py-2 px-4 border-b border-gray-200">2024-06-05</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800" @click="openModal('jane.smith@example.com')">View</button>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">Alice Brown</td>
                <td class="py-2 px-4 border-b border-gray-200">alice.brown@example.com</td>
                <td class="py-2 px-4 border-b border-gray-200">2024-06-10</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800" @click="openModal('alice.brown@example.com')">View</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
</div>

<!-- Additional JavaScript for Charts and Interactivity -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Sales Chart
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Sales',
                data: [1200, 1900, 3000, 5000, 2300, 3200, 4700],
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Modal functionality
    window.openModal = function(orderId) {
        // Fetch order details using orderId (for now, static values are used)
        document.getElementById('orderId').innerText = orderId;
        document.getElementById('orderCustomer').innerText = 'John Doe';
        document.getElementById('orderTotal').innerText = '123.45';
        document.getElementById('orderStatus').innerText = 'Shipped';
        document.getElementById('orderDate').innerText = '2024-07-01';
        document.querySelector('[x-show="showModal"]').style.display = 'flex';
    };

    window.closeModal = function() {
        document.querySelector('[x-show="showModal"]').style.display = 'none';
    };
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Sales Chart
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Sales',
                data: [1200, 1900, 3000, 5000, 2300, 3200, 4700],
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
        const postContainers = document.querySelectorAll('.transition-transform');

        postContainers.forEach(container => {
            container.addEventListener('mouseover', () => {
                container.classList.add('scale-105', 'shadow-lg');
            });

            container.addEventListener('mouseout', () => {
                container.classList.remove('scale-105', 'shadow-lg');
            });
        });
    });

</script>
@endsection