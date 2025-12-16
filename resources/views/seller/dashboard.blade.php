@extends('seller.layouts.app')

@section('title', 'Seller Dashboard')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Seller Dashboard</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h2>
                    <p class="text-green-100">Manage your organic products and track your sales performance</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <i class="fas fa-store text-3xl"></i>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Products</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ auth()->user()->products()->count() }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-green-600">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ auth()->user()->products()->where('is_active', true)->count() }} active
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-box text-2xl text-green-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Orders</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ auth()->user()->sellerOrders()->count() }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-yellow-600">
                                <i class="fas fa-clock mr-1"></i>
                                {{ auth()->user()->sellerOrders()->whereHas('order', function ($q) {
                                        $q->where('status', 'pending');
                                    })->count() }}
                                pending
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <i class="fas fa-shopping-cart text-2xl text-blue-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Sales</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">
                            <span
                                class="font-bengali">৳</span>{{ number_format(auth()->user()->sellerOrders()->sum('total_price'), 2) }}
                        </p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                8% from last month
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-yellow-50 rounded-lg">
                        <i class="fas fa-chart-line text-2xl text-yellow-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Stock Value</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">
                            <span
                                class="font-bengali">৳</span>{{ number_format(auth()->user()->products()->sum(\DB::raw('price * stock_quantity')), 2) }}
                        </p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-red-600">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ auth()->user()->products()->where('stock_quantity', '<=', 5)->count() }} low stock
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-red-50 rounded-lg">
                        <i class="fas fa-boxes text-2xl text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('seller.products.create') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition">
                            <i class="fas fa-plus text-green-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-medium text-gray-900 group-hover:text-green-700 transition">Add New Product</h3>
                            <p class="text-sm text-gray-500">List a new organic product</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('seller.products.index') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition">
                            <i class="fas fa-edit text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-medium text-gray-900 group-hover:text-blue-700 transition">Manage Products</h3>
                            <p class="text-sm text-gray-500">Edit, update or delete products</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('seller.orders.index') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-lg group-hover:bg-yellow-200 transition">
                            <i class="fas fa-clipboard-list text-yellow-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-medium text-gray-900 group-hover:text-yellow-700 transition">View Orders</h3>
                            <p class="text-sm text-gray-500">Process customer orders</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Products -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Products</h2>
                    <a href="{{ route('seller.products.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View all →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse(auth()->user()->products()->latest()->take(5)->get() as $product)
                        <div
                            class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-carrot text-green-600"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-medium text-gray-900">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-500">Stock: {{ $product->stock_quantity }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900"><span
                                        class="font-bengali">৳</span>{{ number_format($product->price, 2) }}</p>
                                <span
                                    class="text-xs px-2 py-1 rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-box-open text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">No products yet</p>
                            <a href="{{ route('seller.products.create') }}"
                                class="text-sm text-green-600 hover:text-green-700 mt-2 inline-block">
                                Add your first product →
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Orders</h2>
                    <a href="{{ route('seller.orders.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View all →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse(auth()->user()->sellerOrders()->with('order')->latest()->take(5)->get() as $orderItem)
                        <div class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <span class="font-medium text-gray-900">Order
                                        #{{ str_pad($orderItem->order_id, 6, '0', STR_PAD_LEFT) }}</span>
                                    <p class="text-sm text-gray-500">{{ $orderItem->order->customer->name }}</p>
                                </div>
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
                                    class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$orderItem->order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($orderItem->order->status) }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">{{ $orderItem->product->name }}</span>
                                <span class="font-medium text-gray-900"><span
                                        class="font-bengali">৳</span>{{ number_format($orderItem->line_total, 2) }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-shopping-cart text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">No orders yet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
