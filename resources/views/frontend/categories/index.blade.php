@extends('frontend.layouts.app')

@section('title', 'All Categories - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Shop by Category</h1>
                <p class="text-gray-600">Browse products from all our categories</p>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <!-- Category Image -->
                        <div class="relative overflow-hidden aspect-square">
                            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="{{ $category->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-xl font-bold text-white mb-2">{{ $category->name }}</h3>
                                <div class="flex items-center justify-between">
                                    <span class="text-white/90 text-sm">{{ $category->products_count }} products</span>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full group-hover:bg-primary-600 transition-colors duration-300">
                                        <i class="fas fa-arrow-right text-white"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Category Description -->
                        <div class="p-6">
                            <p class="text-gray-600 text-sm line-clamp-2">{{ $category->description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Stats -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-primary-600 text-white rounded-2xl p-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-leaf text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">{{ $categories->sum('products_count') }}</h3>
                            <p class="text-primary-100">Total Products</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-store text-primary-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">
                                {{ count(array_unique($categories->pluck('id')->toArray())) }}</h3>
                            <p class="text-gray-600">Categories</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-users text-primary-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">50+</h3>
                            <p class="text-gray-600">Active Sellers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
