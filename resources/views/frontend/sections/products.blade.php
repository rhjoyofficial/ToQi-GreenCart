<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Featured Products</h2>
                <p class="text-gray-600">Best selling products this week</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="flex space-x-2">
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        All
                    </button>
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        New Arrivals
                    </button>
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        Best Sellers
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
            @foreach ($products as $product)
                <div
                    class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden animate-slide-up">
                    <!-- Product Image -->
                    <div class="relative overflow-hidden aspect-square">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                        <!-- Badge -->
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
                        <!-- Quick Actions -->
                        <div
                            class="absolute top-4 right-4 flex flex-col space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full shadow flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors duration-200">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button onclick="window.location='{{ route('products.show', $product->slug) }}'"
                                class="w-10 h-10 bg-white rounded-full shadow flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors duration-200"
                                title="View product">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <a href="{{ route('categories.show', $product->category->slug ?? '#') }}"
                                class="text-sm text-primary-600 font-medium hover:underline">
                                <span
                                    class="text-sm text-gray-500">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </a>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <span class="text-sm text-gray-600 ml-1">4.5</span>
                            </div>
                        </div>
                        <a href="{{ route('products.show', $product->slug) }}">
                            <h3 class="font-semibold text-gray-900 mb-2 line-clamp-1">{{ $product->name }}</h3>
                        </a>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>

                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-gray-900"><span
                                        class="font-bengali">৳</span>{{ number_format($product->price, 2) }}</span>
                                @if ($product->price > 50)
                                    <span class="text-sm text-gray-500 line-through ml-2"><span
                                            class="font-bengali">৳</span>{{ number_format($product->price * 1.2, 2) }}</span>
                                @endif
                            </div>
                            <button data-product-id="{{ $product->id }}"
                                class="relative group add-to-cart flex items-center justify-center w-10 h-10 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                <i class="fas fa-shopping-cart"></i>
                                <span
                                    class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 whitespace-nowrap rounded px-2 py-1 text-xs {{ $product->stock_quantity == 0 ? 'bg-red-600 text-white' : 'bg-green-600 text-white' }} opacity-0 group-hover:opacity-100 transition pointer-events-none">
                                    {{ $product->stock_quantity == 0 ? 'Out of stock' : 'Add to cart' }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Products Button -->
        <div class="text-center mt-12">
            <a href="#"
                class="inline-flex items-center px-8 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                <span>View All Products</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
