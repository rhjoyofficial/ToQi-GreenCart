@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Admin Dashboard</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="max-w-8xl mx-auto">
        <div class="space-y-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\User::count() }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-user mr-1"></i>
                                    {{ \App\Models\User::where('role_id', 3)->count() }} customers
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-green-50 rounded-lg">
                            <i class="fas fa-users text-2xl text-green-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Products</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Product::count() }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-xs text-green-600">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    {{ \App\Models\Product::where('is_active', true)->count() }} active
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-box text-2xl text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Orders</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Order::count() }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-xs text-yellow-600">
                                    <i class="fas fa-clock mr-1"></i>
                                    {{ \App\Models\Order::where('status', 'pending')->count() }} pending
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-yellow-50 rounded-lg">
                            <i class="fas fa-shopping-cart text-2xl text-yellow-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Revenue</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                ${{ number_format(\App\Models\Order::sum('total_amount'), 2) }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-xs text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    12% from last month
                                </span>
                            </div>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-lg">
                            <i class="fas fa-chart-line text-2xl text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.users.create') }}"
                        class="group p-4 border border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition">
                        <div class="flex items-center">
                            <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition">
                                <i class="fas fa-user-plus text-green-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900 group-hover:text-green-700 transition">Add New User
                                </h3>
                                <p class="text-sm text-gray-500">Create admin, seller or customer</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.products.create') }}"
                        class="group p-4 border border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition">
                                <i class="fas fa-plus-circle text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900 group-hover:text-blue-700 transition">Add Product</h3>
                                <p class="text-sm text-gray-500">Create new product listing</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.orders.index') }}"
                        class="group p-4 border border-gray-200 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition">
                        <div class="flex items-center">
                            <div class="p-2 bg-yellow-100 rounded-lg group-hover:bg-yellow-200 transition">
                                <i class="fas fa-clipboard-list text-yellow-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900 group-hover:text-yellow-700 transition">View Orders
                                </h3>
                                <p class="text-sm text-gray-500">Manage all customer orders</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Orders</h2>
                    <a href="{{ route('admin.orders.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View all →
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order
                                    ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Customer</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse(\App\Models\Order::latest()->take(5)->get() as $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                        #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $order->customer->name }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                        ${{ number_format($order->total_amount, 2) }}</td>
                                    <td class="px-4 py-3">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'paid' => 'bg-blue-100 text-blue-800',
                                                'processing' => 'bg-purple-100 text-purple-800',
                                                'shipped' => 'bg-indigo-100 text-indigo-800',
                                                'delivered' => 'bg-green-100 text-green-800',
                                                'cancelled' => 'bg-red-100 text-red-800',
                                            ];
                                        @endphp
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                        <i class="fas fa-inbox text-3xl mb-2"></i>
                                        <p>No orders yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
