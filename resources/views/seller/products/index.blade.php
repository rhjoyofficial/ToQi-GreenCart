@extends('seller.layouts.app')

@section('title', 'My Products')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Products</span>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">My Products</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="max-w-8xl mx-auto">
        <!-- Header with Stats -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">My Products</h1>
                    <p class="text-gray-600 mt-1">Manage your product listings</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('seller.products.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Add New Product
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Products</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ $products->total() }}</p>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <i class="fas fa-box text-xl text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Products</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">
                            {{ $products->where('is_active', true)->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-check-circle text-xl text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Out of Stock</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">
                            {{ $products->where('stock_quantity', 0)->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-red-50 rounded-lg">
                        <i class="fas fa-exclamation-triangle text-xl text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Search by name..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Stock Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock Status</label>
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="">All Stock</option>
                        <option value="in_stock">In Stock</option>
                        <option value="low_stock">Low Stock (≤ 10)</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end mt-4">
                <button
                    class="px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    Apply Filters
                </button>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <!-- Product Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if ($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                class="w-12 h-12 object-cover rounded-lg mr-4">
                                        @else
                                            <div
                                                class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                                <i class="fas fa-box text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('products.show', $product->slug) }}" target="_blank"
                                                class="font-medium text-gray-900 hover:text-green-600 transition-colors duration-200">
                                                {{ $product->name }}
                                            </a>
                                            <p class="text-sm text-gray-500 mt-1">
                                                SKU: PROD-{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Category -->
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-900"><span
                                            class="font-bengali">৳</span>{{ number_format($product->price, 2) }}</span>
                                </td>

                                <!-- Stock -->
                                <td class="px-6 py-4">
                                    @if ($product->stock_quantity > 10)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            {{ $product->stock_quantity }}
                                        </span>
                                    @elseif($product->stock_quantity > 0 && $product->stock_quantity <= 10)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $product->stock_quantity }} (Low)
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i>
                                            Out of Stock
                                        </span>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
                                    @if ($product->is_active)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check mr-1"></i>
                                            Active
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i>
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('seller.products.edit', $product) }}"
                                            class="text-blue-600 hover:text-blue-800 transition-colors duration-200"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button onclick="toggleStatus({{ $product->id }})"
                                            class="text-{{ $product->is_active ? 'yellow' : 'green' }}-600 hover:text-{{ $product->is_active ? 'yellow' : 'green' }}-800 transition-colors duration-200"
                                            title="{{ $product->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas fa-{{ $product->is_active ? 'eye-slash' : 'eye' }}"></i>
                                        </button>

                                        <button onclick="confirmDelete({{ $product->id }})"
                                            class="text-red-600 hover:text-red-800 transition-colors duration-200"
                                            title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <a href="{{ route('products.show', $product->slug) }}" target="_blank"
                                            class="text-gray-600 hover:text-gray-800 transition-colors duration-200"
                                            title="View">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-box-open text-gray-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">No products yet</h3>
                                        <p class="text-gray-600 mb-4">Start by adding your first product</p>
                                        <a href="{{ route('seller.products.create') }}"
                                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                                            <i class="fas fa-plus-circle mr-2"></i>
                                            Add Your First Product
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($products->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleStatus(productId) {
            if (confirm('Are you sure you want to change the product status?')) {
                fetch(`/seller/products/${productId}/toggle-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        function confirmDelete(productId) {
            if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
                fetch(`/seller/products/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>
@endpush
