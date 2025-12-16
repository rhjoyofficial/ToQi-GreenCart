@extends('frontend.layouts.app')

@section('title', 'Shopping Cart - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Shopping Cart</h1>

            @if ($cartItems->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm">
                            <!-- Cart Header -->
                            <div class="p-6 border-b border-gray-200">
                                <div class="grid grid-cols-12 gap-4 text-sm font-medium text-gray-700">
                                    <div class="col-span-6">Product</div>
                                    <div class="col-span-2 text-center">Price</div>
                                    <div class="col-span-2 text-center">Quantity</div>
                                    <div class="col-span-2 text-center">Total</div>
                                </div>
                            </div>

                            <!-- Cart Items List -->
                            <div class="divide-y divide-gray-200">
                                @foreach ($cartItems as $item)
                                    <div class="p-6">
                                        <div class="grid grid-cols-12 gap-4 items-center">
                                            <!-- Product Info -->
                                            <div class="col-span-6">
                                                <div class="flex items-center space-x-4">
                                                    <a href="{{ route('products.show', $item->product->slug) }}"
                                                        class="flex-shrink-0">
                                                        <img src="{{ $item->product->image }}"
                                                            alt="{{ $item->product->name }}"
                                                            class="w-20 h-20 object-cover rounded-lg">
                                                    </a>
                                                    <div>
                                                        <a href="{{ route('products.show', $item->product->slug) }}"
                                                            class="block">
                                                            <h3
                                                                class="font-medium text-gray-900 hover:text-primary-600 transition-colors duration-200">
                                                                {{ $item->product->name }}
                                                            </h3>
                                                        </a>
                                                        <p class="text-sm text-gray-500 mt-1">In Stock:
                                                            {{ $item->product->stock_quantity }}</p>
                                                        <button
                                                            class="text-red-600 hover:text-red-800 text-sm font-medium mt-2 transition-colors duration-200">
                                                            <i class="fas fa-trash-alt mr-1"></i> Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="col-span-2">
                                                <div class="text-center">
                                                    <span class="font-medium text-gray-900"><span
                                                            class="font-bengali">৳</span>{{ number_format($item->unit_price, 2) }}</span>
                                                </div>
                                            </div>

                                            <!-- Quantity -->
                                            <div class="col-span-2">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <button
                                                        class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input type="number" value="{{ $item->quantity }}" min="1"
                                                        max="{{ $item->product->stock_quantity }}"
                                                        class="w-16 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                                    <button
                                                        class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Total -->
                                            <div class="col-span-2">
                                                <div class="text-center">
                                                    <span class="font-bold text-gray-900"><span
                                                            class="font-bengali">৳</span>{{ number_format($item->total_price, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Cart Footer -->
                            <div class="p-6 border-t border-gray-200">
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                                    <div class="flex items-center space-x-4">
                                        <input type="text" placeholder="Coupon code"
                                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                        <button
                                            class="px-6 py-2 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200">
                                            Apply Coupon
                                        </button>
                                    </div>
                                    <button
                                        class="px-6 py-2 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                        <i class="fas fa-redo-alt mr-2"></i> Update Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Continue Shopping -->
                        <div class="mt-6">
                            <a href="{{ route('products.index') }}"
                                class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Continue Shopping
                            </a>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-sm sticky top-24">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900">Order Summary</h2>
                            </div>

                            <div class="p-6 space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium"><span
                                            class="font-bengali">৳</span>{{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping</span>
                                    <span class="font-medium">
                                        @if ($shipping == 0)
                                            <span class="text-green-600">Free</span>
                                        @else
                                            <span class="font-bengali">৳</span>{{ number_format($shipping, 2) }}
                                        @endif
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax</span>
                                    <span class="font-medium"><span
                                            class="font-bengali">৳</span>{{ number_format($tax, 2) }}</span>
                                </div>

                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex justify-between text-lg font-bold">
                                        <span>Total</span>
                                        <span><span class="font-bengali">৳</span>{{ number_format($total, 2) }}</span>
                                    </div>
                                </div>

                                <!-- Shipping Note -->
                                @if ($shipping == 0)
                                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-shipping-fast text-green-600 mr-2"></i>
                                            <span class="text-green-700 font-medium">Free shipping on orders over $50</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-info-circle text-yellow-600 mr-2"></i>
                                            <span class="text-yellow-700">Add <span
                                                    class="font-bengali">৳</span>{{ number_format(5000 - $subtotal, 2) }}
                                                more
                                                for free shipping</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Proceed to Checkout -->
                                <a href="{{ route('checkout.index') }}"
                                    class="block w-full px-6 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 text-center shadow-lg hover:shadow-xl">
                                    Proceed to Checkout
                                </a>

                                <!-- Payment Methods -->
                                <div class="pt-4">
                                    <p class="text-sm text-gray-600 mb-3">We accept:</p>
                                    <div class="flex items-center space-x-4">
                                        <i class="fab fa-cc-visa text-2xl text-gray-400"></i>
                                        <i class="fab fa-cc-mastercard text-2xl text-gray-400"></i>
                                        <i class="fab fa-cc-paypal text-2xl text-gray-400"></i>
                                        <i class="fab fa-cc-apple-pay text-2xl text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Need Help -->
                        <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
                            <h3 class="font-semibold text-gray-900 mb-3">Need Help?</h3>
                            <div class="space-y-3">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-phone-alt text-primary-600 mr-3"></i>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-envelope text-primary-600 mr-3"></i>
                                    <span>support@greencart.com</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-clock text-primary-600 mr-3"></i>
                                    <span>Mon-Fri: 9AM-6PM EST</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-4xl text-gray-400"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Your cart is empty</h2>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Looks like you haven't added any products to your cart
                        yet.</p>
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center px-8 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
