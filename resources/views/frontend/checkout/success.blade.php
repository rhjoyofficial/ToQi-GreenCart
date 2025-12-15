@extends('frontend.layouts.app')

@section('title', 'Order Confirmed - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <!-- Success Icon -->
                <div class="w-24 h-24 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-4xl text-green-600"></i>
                </div>

                <!-- Success Message -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Order Confirmed!</h1>
                <p class="text-lg text-gray-600 mb-8">
                    Thank you for your purchase. Your order has been received and is being processed.
                </p>

                <!-- Order Details -->
                <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto mb-3 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-receipt text-blue-600 text-xl"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Order Number</h3>
                            <p class="text-gray-600">ORD-{{ strtoupper(uniqid()) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto mb-3 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-green-600 text-xl"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Order Date</h3>
                            <p class="text-gray-600">{{ now()->format('F d, Y') }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto mb-3 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-credit-card text-purple-600 text-xl"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Total Amount</h3>
                            <p class="text-2xl font-bold text-gray-900"><span class="font-bengali">৳</span>89.97</p>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">What's Next?</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-primary-600 font-bold">1</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Order Confirmation Email</h3>
                                <p class="text-gray-600">You'll receive an email confirmation with your order details
                                    shortly.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-primary-600 font-bold">2</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Order Processing</h3>
                                <p class="text-gray-600">Our team is preparing your order for shipment.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-primary-600 font-bold">3</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Shipping Notification</h3>
                                <p class="text-gray-600">You'll receive tracking information once your order ships.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center px-8 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Continue Shopping
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center px-8 py-3 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200">
                        <i class="fas fa-user-circle mr-2"></i>
                        View My Orders
                    </a>
                </div>

                <!-- Contact Info -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <p class="text-gray-600 mb-4">Have questions about your order?</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt text-primary-600 mr-2"></i>
                            <span class="text-gray-900 font-medium">+88017-xxxxxxxxx</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-primary-600 mr-2"></i>
                            <span class="text-gray-900 font-medium">support@greencart.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
