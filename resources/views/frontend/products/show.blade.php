@extends('frontend.layouts.app')

@section('title', $product->name . ' - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
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
                        <a href="{{ route('products.index') }}" class="hover:text-primary-600 transition-colors duration-200">
                            Products
                        </a>
                    </li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li>
                        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                            class="hover:text-primary-600 transition-colors duration-200">
                            {{ $product->category->name }}
                        </a>
                    </li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li class="text-gray-900 font-medium">{{ $product->name }}</li>
                </ol>
            </nav>

            <!-- Product Details -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                    <!-- Product Images -->
                    <div>
                        <div class="rounded-xl overflow-hidden mb-4">
                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80' }}"
                                alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-xl">
                        </div>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="border-2 border-primary-500 rounded-lg overflow-hidden">
                                <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80' }}"
                                    alt="{{ $product->name }}" class="w-full h-20 object-cover">
                            </div>
                            <!-- Add more thumbnail images here -->
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div>
                        <div class="mb-6">
                            <span
                                class="inline-block px-3 py-1 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-3">
                                {{ $product->category->name }}
                            </span>
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>

                            <div class="flex items-center space-x-4 mb-4">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-gray-600 ml-2">4.5 (120 reviews)</span>
                                </div>
                                <span class="text-gray-400">|</span>
                                <span class="text-green-600 font-semibold">
                                    @if ($product->stock_quantity > 0)
                                        <i class="fas fa-check-circle"></i> In Stock
                                    @else
                                        <i class="fas fa-times-circle"></i> Out of Stock
                                    @endif
                                </span>
                            </div>

                            <div class="text-4xl font-bold text-gray-900 mb-6">
                                <span class="font-bengali">৳</span>{{ number_format($product->price, 2) }}
                                @if ($product->price > 50)
                                    <span class="text-lg text-gray-500 line-through ml-2"><span
                                            class="font-bengali">৳</span>{{ number_format($product->price * 1.2, 2) }}</span>
                                    <span class="text-sm bg-red-100 text-red-800 font-semibold px-2 py-1 rounded ml-2">Save
                                        20%</span>
                                @endif
                            </div>

                            <p class="text-gray-700 mb-8 leading-relaxed">{{ $product->description }}</p>

                            <!-- Seller Info -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg mb-8">
                                <div class="w-12 h-12 rounded-full overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                        alt="Seller" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Sold by
                                        {{ $product->seller->name ?? 'GreenCart Seller' }}</h4>
                                    <p class="text-sm text-gray-600">Trusted Organic Seller</p>
                                </div>
                                <div class="ml-auto">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="text-sm text-gray-600">4.9/5 rating</p>
                                </div>
                            </div>

                            <!-- Add to Cart -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button
                                            class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-primary-600">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" min="1"
                                            max="{{ $product->stock_quantity }}"
                                            class="w-16 text-center border-0 focus:outline-none focus:ring-0">
                                        <button
                                            class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-primary-600">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-gray-600">{{ $product->stock_quantity }} available</span>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-4">
                                    <button data-product-id="{{ $product->id }}"
                                        class="flex-1 px-8 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed"
                                        {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                        <i class="fas fa-shopping-cart mr-2"></i>
                                        Add to Cart
                                    </button>
                                    <button
                                        class="flex-1 px-8 py-3 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200 flex items-center justify-center">
                                        <i class="fas fa-heart mr-2"></i>
                                        Add to Wishlist
                                    </button>
                                </div>

                                <div class="pt-6 border-t border-gray-200">
                                    <div class="flex flex-wrap gap-4">
                                        <button class="flex items-center space-x-2 text-gray-600 hover:text-primary-600">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Share</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-600 hover:text-primary-600">
                                            <i class="fas fa-balance-scale"></i>
                                            <span>Compare</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-600 hover:text-primary-600">
                                            <i class="fas fa-question-circle"></i>
                                            <span>Ask Question</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs Section -->
                <div class="border-t border-gray-200">
                    <div class="border-b border-gray-200">
                        <nav class="flex">
                            <button class="px-6 py-4 text-lg font-medium text-primary-600 border-b-2 border-primary-600">
                                Description
                            </button>
                            <button class="px-6 py-4 text-lg font-medium text-gray-500 hover:text-gray-700">
                                Reviews (120)
                            </button>
                            <button class="px-6 py-4 text-lg font-medium text-gray-500 hover:text-gray-700">
                                Shipping & Returns
                            </button>
                        </nav>
                    </div>
                    <div class="p-8">
                        <div class="prose max-w-none">
                            <h3 class="text-xl font-semibold mb-4">Product Details</h3>
                            <p class="text-gray-700 mb-6">{{ $product->description }}</p>

                            <h3 class="text-xl font-semibold mb-4">Features</h3>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-6">
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    <span>100% Organic Certified</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    <span>No Pesticides Used</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    <span>Freshly Harvested</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    <span>Sustainably Grown</span>
                                </li>
                            </ul>

                            <h3 class="text-xl font-semibold mb-4">Storage Instructions</h3>
                            <p class="text-gray-700">Store in a cool, dry place. Refrigerate after opening for best
                                results.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if ($relatedProducts->count() > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div
                                class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden">
                                <a href="{{ route('products.show', $relatedProduct->slug) }}">
                                    <div class="relative overflow-hidden aspect-square">
                                        <img src="{{ $relatedProduct->image ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                                            alt="{{ $relatedProduct->name }}"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                    </div>
                                </a>
                                <div class="p-4">
                                    <a href="{{ route('products.show', $relatedProduct->slug) }}" class="block">
                                        <h4
                                            class="font-semibold text-gray-900 mb-2 hover:text-primary-600 transition-colors duration-200 line-clamp-1">
                                            {{ $relatedProduct->name }}
                                        </h4>
                                    </a>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-gray-900"><span
                                                class="font-bengali">৳</span>{{ number_format($relatedProduct->price, 2) }}</span>
                                        <button
                                            class="w-8 h-8 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                            <i class="fas fa-shopping-cart text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
