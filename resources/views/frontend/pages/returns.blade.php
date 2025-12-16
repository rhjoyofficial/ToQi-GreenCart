@extends('frontend.layouts.app')

@section('title', 'Return & Refund Policy - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
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
                    <li class="text-gray-900 font-medium">Return Policy</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Return & Refund Policy</h1>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Learn about our return process, eligibility, and refund timelines.
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- Policy Summary -->
                <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-8 text-white mb-8">
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h2 class="text-2xl font-bold">Policy at a Glance</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                            <div class="text-3xl font-bold mb-1">30</div>
                            <div class="text-sm text-primary-100">Days to Return</div>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                            <div class="text-3xl font-bold mb-1">5-7</div>
                            <div class="text-sm text-primary-100">Business Days for Refunds</div>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                            <div class="text-3xl font-bold mb-1">Free</div>
                            <div class="text-sm text-primary-100">Returns on Defective Items</div>
                        </div>
                    </div>
                </div>

                <!-- Return Process -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Return Process</h2>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                        <div class="text-center">
                            <div
                                class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl font-bold text-primary-600">1</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Initiate Return</h3>
                            <p class="text-sm text-gray-600">Request return in your account within 30 days</p>
                        </div>
                        <div class="text-center">
                            <div
                                class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl font-bold text-primary-600">2</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Package Item</h3>
                            <p class="text-sm text-gray-600">Use original packaging with all accessories</p>
                        </div>
                        <div class="text-center">
                            <div
                                class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl font-bold text-primary-600">3</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Ship Back</h3>
                            <p class="text-sm text-gray-600">Use provided return label and drop off at carrier</p>
                        </div>
                        <div class="text-center">
                            <div
                                class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl font-bold text-primary-600">4</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Receive Refund</h3>
                            <p class="text-sm text-gray-600">Get refund within 5-7 business days after inspection</p>
                        </div>
                    </div>

                    <a href="#"
                        class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200">
                        Start a Return
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Return Eligibility -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Return Eligibility</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Eligible for Return
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    Items in original condition with tags attached
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    Defective or damaged items received
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    Incorrect items shipped
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    Unopened items in original packaging
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Not Eligible for Return
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Perishable items (food, flowers)
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Items used or worn
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Personalized or custom items
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Items returned after 30 days
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Refund Details -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Refund Details</h2>

                    <div class="overflow-x-auto mb-6">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Return Type</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Refund Method</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Processing Time</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Shipping Costs</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">Defective/Damaged</td>
                                    <td class="px-6 py-4 text-gray-600">Original payment method</td>
                                    <td class="px-6 py-4 text-gray-600">5-7 business days</td>
                                    <td class="px-6 py-4 text-green-600 font-medium">FREE</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">Wrong Item</td>
                                    <td class="px-6 py-4 text-gray-600">Original payment method</td>
                                    <td class="px-6 py-4 text-gray-600">5-7 business days</td>
                                    <td class="px-6 py-4 text-green-600 font-medium">FREE</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">Change of Mind</td>
                                    <td class="px-6 py-4 text-gray-600">Store credit or original payment</td>
                                    <td class="px-6 py-4 text-gray-600">7-10 business days</td>
                                    <td class="px-6 py-4 text-gray-600">Customer pays</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-600 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.698-.833-2.464 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                            <p class="text-yellow-800">
                                <strong>Note:</strong> Original shipping charges are non-refundable for change of mind
                                returns. Refunds may take 1-2 billing cycles to appear on your statement.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Exchange Policy -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Exchange Policy</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-3">Size/Color Exchanges</h3>
                            <p class="text-gray-600 mb-4">
                                We offer free size and color exchanges within 30 days of purchase, subject to stock
                                availability.
                            </p>
                            <ul class="space-y-2">
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Exchanges must be in new, unworn condition
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Original tags and packaging required
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Free return shipping for exchanges
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="font-semibold text-gray-900 mb-3">Exchange Process</h3>
                            <ol class="space-y-2">
                                <li class="flex items-center text-gray-600">
                                    <span
                                        class="w-6 h-6 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mr-3 text-sm font-medium">1</span>
                                    Request exchange from your account
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <span
                                        class="w-6 h-6 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mr-3 text-sm font-medium">2</span>
                                    Ship the original item back to us
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <span
                                        class="w-6 h-6 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mr-3 text-sm font-medium">3</span>
                                    We ship the replacement item
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
