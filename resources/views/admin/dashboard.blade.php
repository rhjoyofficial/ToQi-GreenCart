@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('page-header')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard Overview</h1>
            <p class="text-gray-600 mt-1">Welcome back! Here's what's happening with your store today.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-600">Period:</span>
                <select
                    class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm">
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month" selected>This Month</option>
                    <option value="year">This Year</option>
                </select>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Revenue -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                        <p class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
                            <span class="font-bengali">৳</span>{{ number_format($totalRevenue, 2) }}
                        </p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs {{ $revenueGrowth >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                <i class="fas fa-arrow-{{ $revenueGrowth >= 0 ? 'up' : 'down' }} mr-1"></i>
                                {{ abs($revenueGrowth) }}% from last month
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-dollar-sign text-2xl text-green-600"></i>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Orders</p>
                        <p class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">{{ $totalOrders }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-yellow-600">
                                <i class="fas fa-clock mr-1"></i>
                                {{ $pendingOrders }} pending
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-yellow-50 rounded-lg">
                        <i class="fas fa-shopping-cart text-2xl text-yellow-600"></i>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Products</p>
                        <p class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">{{ $totalProducts }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-green-600">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ $activeProducts }} active
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <i class="fas fa-box text-2xl text-blue-600"></i>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Users</p>
                        <p class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-gray-500">
                                <i class="fas fa-users mr-1"></i>
                                {{ $sellers }} sellers, {{ $customers }} customers
                            </span>
                        </div>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-lg">
                        <i class="fas fa-users text-2xl text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Revenue Chart -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Revenue Overview</h2>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-xs font-medium rounded-lg bg-green-50 text-green-700">
                            Monthly
                        </button>
                        <button class="px-3 py-1 text-xs font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                            Weekly
                        </button>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- Orders Chart -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Orders Status</h2>
                    <span class="text-sm text-gray-500">Last 30 days</span>
                </div>
                <div class="h-64">
                    <canvas id="ordersChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Top Products -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Orders</h2>
                    <a href="{{ route('admin.orders.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View all →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse($recentOrders as $order)
                        <div
                            class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-shopping-cart text-gray-500"></i>
                                </div>
                                <div>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="font-medium text-gray-900 hover:text-green-600 transition">
                                        Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                    </a>
                                    <p class="text-xs text-gray-500">{{ $order->customer->name }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900"><span
                                        class="font-bengali">৳</span>{{ number_format($order->total_amount, 2) }}</p>
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'processing' => 'bg-blue-100 text-blue-800',
                                        'shipped' => 'bg-indigo-100 text-indigo-800',
                                        'delivered' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                @endphp
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-inbox text-3xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500">No recent orders</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Top Selling Products -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Top Selling Products</h2>
                    <a href="{{ route('admin.products.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View all →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse($topProducts as $product)
                        <div
                            class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center">
                                @if ($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                        class="w-10 h-10 object-cover rounded-lg mr-3">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-box text-gray-500"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="font-medium text-gray-900 hover:text-green-600 transition">
                                        {{ Str::limit($product->name, 30) }}
                                    </a>
                                    <p class="text-xs text-gray-500">{{ $product->category->name ?? 'Uncategorized' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900"><span
                                        class="font-bengali">৳</span>{{ number_format($product->price, 2) }}</p>
                                <div class="flex items-center justify-end mt-1">
                                    <i class="fas fa-star text-yellow-400 text-xs mr-1"></i>
                                    <span class="text-xs text-gray-600">4.5</span>
                                    <span class="mx-1 text-gray-300">•</span>
                                    <span class="text-xs text-gray-500">{{ $product->orderItems->sum('quantity') }}
                                        sold</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-chart-bar text-3xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500">No sales data yet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-green-100">Avg. Order Value</p>
                        <p class="text-2xl font-bold mt-2"><span
                                class="font-bengali">৳</span>{{ number_format($avgOrderValue, 2) }}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-lg">
                        <i class="fas fa-calculator text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-blue-100">Conversion Rate</p>
                        <p class="text-2xl font-bold mt-2">{{ number_format($conversionRate, 1) }}%</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-lg">
                        <i class="fas fa-percentage text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-purple-100">Customer Satisfaction</p>
                        <p class="text-2xl font-bold mt-2">{{ number_format($customerSatisfaction, 1) }}/5</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-lg">
                        <i class="fas fa-smile text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: @json($revenueLabels),
                datasets: [{
                    label: 'Revenue (<span class="font-bengali">৳</span>)',
                    data: @json($revenueData),
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return '<span class="font-bengali">৳</span>' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Orders Chart
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ordersCtx, {
            type: 'doughnut',
            data: {
                labels: @json($orderStatusLabels),
                datasets: [{
                    data: @json($orderStatusData),
                    backgroundColor: [
                        '#FBBF24', // Yellow for pending
                        '#3B82F6', // Blue for processing
                        '#8B5CF6', // Purple for shipped
                        '#10B981', // Green for delivered
                        '#EF4444' // Red for cancelled
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                },
                cutout: '70%'
            }
        });
    </script>
@endpush
