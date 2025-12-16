@extends('frontend.layouts.app')

@section('title', 'Privacy Policy - GreenCart')

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
                    <li class="text-gray-900 font-medium">Privacy Policy</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Privacy Policy</h1>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Last Updated: {{ date('F d, Y') }}
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- Introduction -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">1. Introduction</h2>
                    <p class="text-gray-600 mb-4">
                        Welcome to GreenCart ("we," "our," or "us"). We are committed to protecting your privacy and
                        ensuring you have a positive experience on our website and in using our services.
                    </p>
                    <p class="text-gray-600">
                        This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you
                        visit our website or make a purchase from us.
                    </p>
                </div>

                <!-- Information We Collect -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">2. Information We Collect</h2>

                    <h3 class="font-semibold text-gray-900 mb-4">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Information You Provide</h4>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Name and contact information
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Email address and phone number
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Shipping and billing addresses
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Payment information
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Automatically Collected</h4>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    IP address and browser type
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Device information
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Usage data and preferences
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full mr-2"></div>
                                    Cookies and tracking technologies
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- How We Use Information -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">3. How We Use Your Information</h2>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Order Processing</h3>
                                <p class="text-gray-600">To process and fulfill your orders, send order confirmations, and
                                    provide customer support.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Personalization</h3>
                                <p class="text-gray-600">To personalize your experience and deliver content and product
                                    offerings relevant to your interests.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Marketing Communications</h3>
                                <p class="text-gray-600">To send you promotional emails, with your consent. You may opt-out
                                    at any time.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Sharing -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">4. Information Sharing</h2>

                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <p class="text-gray-600 mb-4">
                            We do not sell, trade, or rent your personal information to third parties. We may share your
                            information in the following circumstances:
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">Service providers and partners</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">Legal compliance and protection</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">Business transfers</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">With your consent</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Rights -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">5. Your Rights</h2>

                    <div class="space-y-4">
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-medium text-gray-900 mb-2">Access and Correction</h3>
                            <p class="text-gray-600">You have the right to access and correct your personal information.
                            </p>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-medium text-gray-900 mb-2">Data Portability</h3>
                            <p class="text-gray-600">You can request a copy of your data in a structured, machine-readable
                                format.</p>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-medium text-gray-900 mb-2">Deletion</h3>
                            <p class="text-gray-600">You may request deletion of your personal information, subject to
                                legal requirements.</p>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <h3 class="font-medium text-gray-900 mb-2">Opt-Out</h3>
                            <p class="text-gray-600">You can opt-out of marketing communications at any time by clicking
                                "unsubscribe."</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-6 py-3 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            Exercise Your Rights
                        </a>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">6. Data Security</h2>

                    <div class="flex items-start mb-4">
                        <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                        <div>
                            <p class="text-gray-600">
                                We implement appropriate technical and organizational security measures to protect your
                                personal information against unauthorized access, alteration, disclosure, or destruction.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-2xl font-bold text-primary-600 mb-2">256-bit</div>
                            <div class="text-sm text-gray-600">SSL Encryption</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-2xl font-bold text-primary-600 mb-2">PCI DSS</div>
                            <div class="text-sm text-gray-600">Compliant</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-2xl font-bold text-primary-600 mb-2">Regular</div>
                            <div class="text-sm text-gray-600">Security Audits</div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-8 text-white">
                    <h2 class="text-2xl font-bold mb-6">7. Contact Us</h2>
                    <p class="mb-6 text-primary-100">
                        If you have any questions about this Privacy Policy, please contact us:
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>privacy@greencart.com</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>123 Green Street, Eco City, Eco State 12345</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span>+1 (555) 123-4567</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
