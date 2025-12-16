@extends('frontend.layouts.app')

@section('title', 'Contact Us - GreenCart')

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
                    <li class="text-gray-900 font-medium">Contact Us</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Contact Us</h1>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Have questions about our products or services? We're here to help! Reach out to us through any of the
                    channels below.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div>
                    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Get in Touch</h2>

                        <!-- Contact Items -->
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Phone Support</h3>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                    <p class="text-sm text-gray-500 mt-1">Monday to Friday, 9AM to 6PM EST</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Email Support</h3>
                                    <p class="text-gray-600">support@greencart.com</p>
                                    <p class="text-sm text-gray-500 mt-1">We respond within 24 hours</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Visit Our Office</h3>
                                    <p class="text-gray-600">123 Green Street, Eco City</p>
                                    <p class="text-gray-600">Eco State 12345, USA</p>
                                    <p class="text-sm text-gray-500 mt-1">Open Monday to Friday, 9AM to 5PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Preview -->
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Quick Questions</h2>
                        <div class="space-y-4">
                            <a href="{{ route('faqs') }}"
                                class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:border-primary-300 hover:bg-primary-50 transition-colors duration-200">
                                <span class="font-medium text-gray-900">Order Tracking</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                            <a href="{{ route('faqs') }}"
                                class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:border-primary-300 hover:bg-primary-50 transition-colors duration-200">
                                <span class="font-medium text-gray-900">Return Process</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                            <a href="{{ route('faqs') }}"
                                class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:border-primary-300 hover:bg-primary-50 transition-colors duration-200">
                                <span class="font-medium text-gray-900">Shipping Rates</span>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div>
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h2>

                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <input type="text" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <input type="text" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    <option value="">Select a subject</option>
                                    <option value="order">Order Inquiry</option>
                                    <option value="shipping">Shipping Question</option>
                                    <option value="return">Return Request</option>
                                    <option value="product">Product Question</option>
                                    <option value="seller">Seller Inquiry</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                                <textarea rows="6" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                            </div>

                            <div class="flex items-start">
                                <input type="checkbox" id="privacy" required
                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded mt-1">
                                <label for="privacy" class="ml-2 block text-sm text-gray-700">
                                    I agree to the <a href="{{ route('privacy') }}"
                                        class="text-primary-600 hover:text-primary-700">Privacy Policy</a> and consent to
                                    my data being processed.
                                </label>
                            </div>

                            <button type="submit"
                                class="w-full px-6 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
