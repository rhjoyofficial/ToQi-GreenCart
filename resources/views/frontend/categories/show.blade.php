@extends('frontend.layouts.app')

@section('title', $category->name . ' - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-600">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="hover:text-primary-600 transition-colors duration-200">
                            Categories
                        </a>
                    </li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li class="text-gray-900 font-medium">{{ $category->name }}</li>
                </ol>
            </nav>

            <!-- Category Header -->
            <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl text-white p-8 mb-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $category->name }}</h1>
                        <p class="text-primary-100 max-w-2xl">{{ $category->description }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full">
                            <i class="fas fa-box-open mr-2"></i>
                            <span>{{ $sellers->total() }} Sellers</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Filters Sidebar -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <!-- Category Info -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Category Details</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Products:</span>
                                    <span class="font-medium">{{ $category->products_count ?? 0 }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sellers:</span>
                                    <span class="font-medium">{{ $sellers->total() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Price Range:</span>
                                    <span class="font-medium"><span
                                            class="font-bengali">৳</span>{{ number_format($minPrice, 2) }} -
                                        <span class="font-bengali">৳</span>{{ number_format($maxPrice, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Filter by Price</h3>
                            <form action="{{ route('categories.show', $category->slug) }}" method="GET" id="priceForm">
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
                                        Apply Price Filter
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Seller Filter -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Filter by Seller</h3>
                            <form action="{{ route('categories.show', $category->slug) }}" method="GET">
                                <div class="space-y-2 max-h-60 overflow-y-auto pr-2">
                                    @foreach ($allSellers as $seller)
                                        <div class="flex items-center">
                                            <input type="radio" name="seller" value="{{ $seller->id }}"
                                                id="seller_{{ $seller->id }}"
                                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300"
                                                {{ request('seller') == $seller->id ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <label for="seller_{{ $seller->id }}" class="ml-2 text-sm text-gray-700">
                                                {{ $seller->name }}
                                                <span class="text-gray-500">({{ $seller->products_count }})</span>
                                            </label>
                                        </div>
                                    @endforeach
                                    @if (request('seller'))
                                        <button type="button"
                                            onclick="window.location.href='{{ route('categories.show', $category->slug) }}'"
                                            class="w-full px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded-lg hover:bg-gray-50 transition-colors duration-200 mt-2">
                                            Clear Seller Filter
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <!-- Clear All Filters -->
                        @if (request()->anyFilled(['min_price', 'max_price', 'seller']))
                            <a href="{{ route('categories.show', $category->slug) }}"
                                class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 inline-flex items-center justify-center">
                                <i class="fas fa-times mr-2"></i>
                                Clear All Filters
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-3/4">
                    <!-- Results Header -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">
                                    {{ $category->name }} Products
                                    <span class="text-gray-600 font-normal">
                                        (Grouped by {{ $sellers->total() }} sellers)
                                    </span>
                                </h2>
                                <p class="text-gray-600 text-sm mt-1">
                                    Showing {{ $sellers->firstItem() ?? 0 }}-{{ $sellers->lastItem() ?? 0 }} of
                                    {{ $sellers->total() }} sellers
                                </p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-700">Sort by:</span>
                                <div class="relative">
                                    <select
                                        onchange="window.location.href = '{{ route('categories.show', $category->slug) }}?sort=' + this.value"
                                        class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                        <option value="products_desc"
                                            {{ request('sort') == 'products_desc' ? 'selected' : '' }}>Most Products
                                        </option>
                                        <option value="products_asc"
                                            {{ request('sort') == 'products_asc' ? 'selected' : '' }}>Fewest Products
                                        </option>
                                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest
                                            Rating</option>
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest
                                            Sellers</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sellers List -->
                    <div class="space-y-6">
                        @forelse($sellers as $seller)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                <!-- Seller Header -->
                                <div class="p-6 border-b border-gray-200 bg-gray-50">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                <div
                                                    class="w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow">
                                                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                                        alt="{{ $seller->name }}" class="w-full h-full object-cover">
                                                </div>
                                                @if ($seller->is_verified ?? true)
                                                    <div
                                                        class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 border-2 border-white rounded-full flex items-center justify-center">
                                                        <i class="fas fa-check text-white text-xs"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-bold text-gray-900">{{ $seller->name }}</h3>
                                                <div class="flex items-center mt-1">
                                                    <div class="flex text-yellow-400">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>
                                                    <span class="text-gray-600 text-sm ml-2">4.5 (120 reviews)</span>
                                                    <span class="mx-2 text-gray-300">•</span>
                                                    <span class="text-gray-600 text-sm">{{ $seller->products_count }}
                                                        products in this category</span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="hidden md:inline-flex items-center px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                            View All Products
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Seller's Products -->
                                <div class="p-6">
                                    @if ($seller->products->count() > 0)
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                            @foreach ($seller->products as $product)
                                                <div
                                                    class="bg-white border border-gray-200 rounded-lg hover:border-primary-300 hover:shadow-md transition-all duration-300 overflow-hidden">
                                                    <!-- Product Image -->
                                                    <a href="{{ route('products.show', $product->slug) }}"
                                                        class="block">
                                                        <div class="relative overflow-hidden aspect-square">
                                                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                                                                alt="{{ $product->name }}"
                                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                                            @if ($product->stock_quantity > 0)
                                                                <span
                                                                    class="absolute top-2 left-2 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                                                    In Stock
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </a>

                                                    <!-- Product Info -->
                                                    <div class="p-4">
                                                        <a href="{{ route('products.show', $product->slug) }}"
                                                            class="block">
                                                            <h4
                                                                class="font-medium text-gray-900 mb-2 hover:text-primary-600 transition-colors duration-200 line-clamp-2">
                                                                {{ $product->name }}
                                                            </h4>
                                                        </a>

                                                        <div class="flex items-center justify-between mt-3">
                                                            <div>
                                                                <span class="text-lg font-bold text-gray-900"><span
                                                                        class="font-bengali">৳</span>{{ number_format($product->price, 2) }}</span>
                                                                @if ($product->price > 50)
                                                                    <span
                                                                        class="text-sm text-gray-500 line-through ml-1"><span
                                                                            class="font-bengali">৳</span>{{ number_format($product->price * 1.2, 2) }}</span>
                                                                @endif
                                                            </div>
                                                            <button data-product-id="{{ $product->id }}"
                                                                class="add-to-cart w-9 h-9 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed"
                                                                {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                                                <i class="fas fa-shopping-cart text-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- View More Products Button -->
                                        @if ($seller->products_count > 4)
                                            <div class="mt-6 text-center">
                                                <a href="#"
                                                    class="inline-flex items-center px-6 py-2 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200">
                                                    View All {{ $seller->products_count }} Products
                                                    <i class="fas fa-arrow-right ml-2"></i>
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-center py-8">
                                            <div
                                                class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-box-open text-gray-400 text-2xl"></i>
                                            </div>
                                            <p class="text-gray-600">No products available from this seller in this
                                                category</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <!-- No Sellers Found -->
                            <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                                <div
                                    class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-store-slash text-gray-400 text-4xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">No Sellers Found</h2>
                                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                                    There are no sellers with products in this category matching your filters.
                                </p>
                                <a href="{{ route('categories.show', $category->slug) }}"
                                    class="inline-flex items-center px-6 py-3 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200">
                                    <i class="fas fa-filter mr-2"></i>
                                    Clear Filters
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if ($sellers->hasPages())
                        <div class="mt-8">
                            {{ $sellers->links() }}
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
