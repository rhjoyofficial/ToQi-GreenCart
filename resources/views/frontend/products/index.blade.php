@extends('frontend.layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <!-- Search -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Search Products</h3>
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search products..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    <button type="submit"
                                        class="absolute right-3 top-2.5 text-gray-400 hover:text-primary-600">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Categories</h3>
                            <div class="space-y-2">
                                <a href="{{ route('products.index') }}"
                                    class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 {{ !request('category') ? 'bg-primary-50 text-primary-600' : 'text-gray-700' }}">
                                    <span>All Categories</span>
                                    <span class="text-sm text-gray-500">{{ $products->total() }}</span>
                                </a>
                                @foreach ($categories as $category)
                                    <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                                        class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 {{ request('category') == $category->slug ? 'bg-primary-50 text-primary-600' : 'text-gray-700' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="text-sm text-gray-500">{{ $category->products_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Price Range</h3>
                            <form action="{{ route('products.index') }}" method="GET" id="priceForm">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Min: <span
                                                class="font-bengali">৳</span><span id="minPriceValue">0</span></label>
                                        <input type="range" name="min_price" min="0" max="{{ $maxPrice }}"
                                            value="{{ request('min_price', 0) }}"
                                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                            oninput="updateMinPrice(this.value)">
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Max: <span
                                                class="font-bengali">৳</span><span
                                                id="maxPriceValue">{{ $maxPrice }}</span></label>
                                        <input type="range" name="max_price" min="0" max="{{ $maxPrice }}"
                                            value="{{ request('max_price', $maxPrice) }}"
                                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                            oninput="updateMaxPrice(this.value)">
                                    </div>
                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                        Apply Filter
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Clear Filters -->
                        @if (request()->anyFilled(['category', 'search', 'min_price', 'max_price', 'sort']))
                            <a href="{{ route('products.index') }}"
                                class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 inline-flex items-center justify-center">
                                <i class="fas fa-times mr-2"></i>
                                Clear All Filters
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:w-3/4">
                    <!-- Header -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">All Products</h1>
                                <p class="text-gray-600">{{ $products->total() }} products found</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-700">Sort by:</span>
                                <div class="relative">
                                    <select
                                        onchange="window.location.href = '{{ route('products.index') }}?sort=' + this.value"
                                        class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest
                                        </option>
                                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                            Price: Low to High</option>
                                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                            Price: High to Low</option>
                                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z
                                        </option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
                                <!-- Product Image -->
                                <div class="relative overflow-hidden aspect-square">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </a>
                                    @if ($product->stock_quantity > 0)
                                        <span
                                            class="absolute top-4 left-4 bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            In Stock
                                        </span>
                                    @else
                                        <span
                                            class="absolute top-4 left-4 bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            Out of Stock
                                        </span>
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <span
                                            class="text-sm text-gray-500">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            <span class="text-sm text-gray-600 ml-1">4.5</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                                        <h3
                                            class="font-semibold text-gray-900 mb-2 hover:text-primary-600 transition-colors duration-200 line-clamp-1">
                                            {{ $product->name }}
                                        </h3>
                                    </a>

                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>

                                    <div class="flex items-center justify-between">
                                        <div>
                                            <span
                                                class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                        </div>
                                        <button data-product-id="{{ $product->id }}"
                                            class="add-to-cart flex items-center justify-center w-10 h-10 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                            {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($products->hasPages())
                        <div class="mt-8">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateMinPrice(value) {
            document.getElementById('minPriceValue').textContent = value;
        }

        function updateMaxPrice(value) {
            document.getElementById('maxPriceValue').textContent = value;
        }

        // Initialize values
        document.addEventListener('DOMContentLoaded', function() {
            updateMinPrice({{ request('min_price', 0) }});
            updateMaxPrice({{ request('max_price', $maxPrice) }});
        });
    </script>
@endpush
