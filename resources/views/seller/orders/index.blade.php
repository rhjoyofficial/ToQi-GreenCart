@extends('seller.layouts.app')

@section('title', 'All Orders')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Orders</span>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">All Orders</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="max-w-8xl mx-auto">
        <!-- Header with Stats -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">All Orders</h1>
                    <p class="text-gray-600 mt-1">Manage your customer orders</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <!-- Export Button (Optional) -->
                    <button
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Export Orders
                    </button>
                </div>
            </div>
        </div>

        <!-- Order Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ $orders->total() }}</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <i class="fas fa-shopping-cart text-xl text-gray-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pending</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">
                            {{ $orders->where('order.status', 'pending')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-yellow-50 rounded-lg">
                        <i class="fas fa-clock text-xl text-yellow-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Processing</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">
                            {{ $orders->where('order.status', 'processing')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <i class="fas fa-cog text-xl text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Revenue</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">
                            <span class="font-bengali">৳</span>{{ number_format($orders->sum('total_price'), 2) }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-50 rounded-lg">
                        <span class="font-bengali text-xl text-green-600 font-semibold">৳</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Date Range -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                    <input type="date"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search Orders</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Order ID or Customer"
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-end">
                    <button
                        class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Products
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($orders as $orderItem)
                            @php
                                $order = $orderItem->order;
                                $customer = $order->customer;
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <!-- Order ID -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-shopping-cart text-gray-500"></i>
                                        </div>
                                        <div>
                                            <a href="{{ route('seller.orders.show', $order->id) }}"
                                                class="font-medium text-gray-900 hover:text-green-600 transition-colors duration-200">
                                                #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                            </a>
                                            <p class="text-xs text-gray-500 mt-1">{{ $order->order_number }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Customer -->
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $customer->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $customer->email }}</p>
                                    </div>
                                </td>

                                <!-- Products -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex -space-x-2">
                                            @foreach ($order->items->where('seller_id', auth()->id())->take(3) as $item)
                                                <div
                                                    class="w-8 h-8 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-box text-gray-500 text-xs"></i>
                                                </div>
                                            @endforeach
                                            @if ($order->items->where('seller_id', auth()->id())->count() > 3)
                                                <div
                                                    class="w-8 h-8 rounded-full border-2 border-white bg-gray-800 flex items-center justify-center">
                                                    <span
                                                        class="text-xs text-white">+{{ $order->items->where('seller_id', auth()->id())->count() - 3 }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="ml-3 text-sm text-gray-600">
                                            {{ $order->items->where('seller_id', auth()->id())->count() }} items
                                        </span>
                                    </div>
                                </td>

                                <!-- Amount -->
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-900"><span
                                            class="font-bengali">৳</span>{{ number_format($orderItem->total_price, 2) }}
                                    </p>
                                    <p class="text-xs text-gray-500">{{ $order->payment_method }}</p>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
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
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        @if ($order->status == 'pending')
                                            <i class="fas fa-clock mr-1"></i>
                                        @elseif($order->status == 'processing')
                                            <i class="fas fa-cog mr-1"></i>
                                        @elseif($order->status == 'shipped')
                                            <i class="fas fa-shipping-fast mr-1"></i>
                                        @elseif($order->status == 'delivered')
                                            <i class="fas fa-check-circle mr-1"></i>
                                        @elseif($order->status == 'cancelled')
                                            <i class="fas fa-times-circle mr-1"></i>
                                        @endif
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                                <!-- Date -->
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-900">{{ $order->created_at->format('M d, Y') }}</p>
                                    <p class="text-xs text-gray-500">{{ $order->created_at->format('h:i A') }}</p>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('seller.orders.show', $order->id) }}"
                                            class="text-blue-600 hover:text-blue-800 transition-colors duration-200"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if ($order->status == 'pending')
                                            <button onclick="updateOrderStatus({{ $order->id }}, 'processing')"
                                                class="text-green-600 hover:text-green-800 transition-colors duration-200"
                                                title="Start Processing">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        @endif

                                        @if ($order->status == 'processing')
                                            <button onclick="updateOrderStatus({{ $order->id }}, 'shipped')"
                                                class="text-purple-600 hover:text-purple-800 transition-colors duration-200"
                                                title="Mark as Shipped">
                                                <i class="fas fa-shipping-fast"></i>
                                            </button>
                                        @endif

                                        <button onclick="printInvoice({{ $order->id }})"
                                            class="text-gray-600 hover:text-gray-800 transition-colors duration-200"
                                            title="Print Invoice">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-shopping-cart text-gray-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">No orders yet</h3>
                                        <p class="text-gray-600">Your orders will appear here when customers purchase your
                                            products</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($orders->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateOrderStatus(orderId, status) {
            if (confirm(`Are you sure you want to mark this order as ${status}?`)) {
                fetch(`/seller/orders/${orderId}/status`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            status: status
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert(data.message || 'Error updating order status');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error updating order status');
                    });
            }
        }

        function printInvoice(orderId) {
            window.open(`/seller/orders/${orderId}/invoice`, '_blank');
        }
    </script>
@endpush
