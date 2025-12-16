@extends('frontend.layouts.app')

@section('title', 'Shipping Policy - GreenCart')

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
                    <li class="text-gray-900 font-medium">Shipping Policy</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Shipping Policy</h1>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Learn about our shipping methods, delivery times, and shipping costs.
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- Shipping Methods -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Shipping Methods & Delivery Times</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="border border-gray-200 rounded-xl p-6">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Standard Shipping</h3>
                            <p class="text-gray-600 text-sm mb-2">3-5 business days</p>
                            <p class="text-gray-600 text-sm">Free on orders over $50</p>
                        </div>

                        <div class="border border-gray-200 rounded-xl p-6">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Express Shipping</h3>
                            <p class="text-gray-600 text-sm mb-2">1-2 business days</p>
                            <p class="text-gray-600 text-sm">$9.99 flat rate</p>
                        </div>

                        <div class="border border-gray-200 rounded-xl p-6">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Same Day Delivery</h3>
                            <p class="text-gray-600 text-sm mb-2">Order by 2 PM local time</p>
                            <p class="text-gray-600 text-sm">$14.99 (select areas)</p>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-4">
                        Delivery times are estimates and begin once your order has shipped. Business days are Monday through
                        Friday, excluding holidays.
                    </p>
                </div>

                <!-- Shipping Costs -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Shipping Costs</h2>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order Value</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Standard Shipping</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Express Shipping</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">Under $50</td>
                                    <td class="px-6 py-4 text-gray-600">$5.99</td>
                                    <td class="px-6 py-4 text-gray-600">$9.99</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">$50 - $100</td>
                                    <td class="px-6 py-4 text-green-600 font-medium">FREE</td>
                                    <td class="px-6 py-4 text-gray-600">$9.99</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">Over $100</td>
                                    <td class="px-6 py-4 text-green-600 font-medium">FREE</td>
                                    <td class="px-6 py-4 text-gray-600">$5.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Delivery Areas -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Delivery Areas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4">Domestic Shipping</h3>
                            <ul class="space-y-2">
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Continental United States
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Alaska & Hawaii
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4">International Shipping</h3>
                            <p class="text-gray-600 mb-4">
                                We currently do not offer international shipping. We plan to expand our shipping to Canada
                                and the UK in Q3 2024.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Order Processing -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Processing & Tracking</h2>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Order Processing Time</h3>
                        <p class="text-gray-600 mb-4">
                            Orders are typically processed within 1-2 business days. Processing time may be longer during
                            holidays or sales events.
                        </p>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-600">
                                <strong>Note:</strong> Orders placed after 2 PM EST will be processed on the next business
                                day.
                            </p>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-900 mb-3">Order Tracking</h3>
                        <p class="text-gray-600 mb-4">
                            Once your order ships, you will receive a shipping confirmation email with a tracking number.
                            You can track your order:
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="#"
                                class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary-300 hover:bg-primary-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Track via Email</span>
                            </a>
                            <a href="#"
                                class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary-300 hover:bg-primary-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Track via Account</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
