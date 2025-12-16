@extends('frontend.layouts.app')

@section('title', 'Frequently Asked Questions - GreenCart')

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
                    <li class="text-gray-900 font-medium">FAQs</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h1>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Find quick answers to the most common questions about shopping with GreenCart. Can't find what you're
                    looking for? <a href="{{ route('contact') }}"
                        class="text-primary-600 hover:text-primary-700 font-medium">Contact our support team</a>.
                </p>
            </div>

            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto mb-12">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Search FAQs..."
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                </div>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- Ordering Questions -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        Ordering & Payment
                    </h2>
                    <div class="space-y-4">
                        @foreach ([['q' => 'How do I place an order?', 'a' => 'Simply browse our products, add items to your cart, and proceed to checkout. You can create an account or checkout as a guest.'], ['q' => 'What payment methods do you accept?', 'a' => 'We accept Visa, MasterCard, American Express, PayPal, Apple Pay, and Cash on Delivery for eligible orders.'], ['q' => 'Is it safe to use my credit card on your site?', 'a' => 'Yes, we use SSL encryption to protect your payment information. We do not store credit card details on our servers.'], ['q' => 'Can I modify or cancel my order?', 'a' => 'You can modify or cancel your order within 1 hour of placing it. After that, please contact our support team.'], ['q' => 'Do you offer discounts for bulk purchases?', 'a' => 'Yes, we offer volume discounts for businesses and bulk purchases. Please contact our sales team for custom quotes.']] as $faq)
                            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                                <button
                                    class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                                    onclick="toggleFAQ(this)">
                                    <span class="font-medium text-gray-900">{{ $faq['q'] }}</span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="px-6 pb-4 hidden">
                                    <p class="text-gray-600">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Shipping & Delivery -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                        Shipping & Delivery
                    </h2>
                    <div class="space-y-4">
                        @foreach ([['q' => 'How long does shipping take?', 'a' => 'Standard shipping takes 3-5 business days. Express shipping (1-2 days) is available for an additional fee.'], ['q' => 'Do you offer free shipping?', 'a' => 'Yes! We offer free standard shipping on all orders over $50.'], ['q' => 'How can I track my order?', 'a' => 'Once your order ships, you will receive a tracking number via email. You can also track your order from your account dashboard.'], ['q' => 'Do you ship internationally?', 'a' => 'Currently, we only ship within the United States. We plan to expand internationally in the future.'], ['q' => 'What happens if I am not home for delivery?', 'a' => 'The carrier will leave a notice and attempt redelivery. You can also pick up your package from the local carrier facility.']] as $faq)
                            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                                <button
                                    class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                                    onclick="toggleFAQ(this)">
                                    <span class="font-medium text-gray-900">{{ $faq['q'] }}</span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="px-6 pb-4 hidden">
                                    <p class="text-gray-600">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Returns & Refunds -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z">
                            </path>
                        </svg>
                        Returns & Refunds
                    </h2>
                    <div class="space-y-4">
                        @foreach ([['q' => 'What is your return policy?', 'a' => 'We offer a 30-day return policy for most items. Products must be unused and in original packaging.'], ['q' => 'How do I return an item?', 'a' => 'Initiate a return from your account dashboard, print the return label, and ship the item back to us.'], ['q' => 'How long do refunds take?', 'a' => 'Refunds are processed within 5-7 business days after we receive and inspect the returned item.'], ['q' => 'Who pays for return shipping?', 'a' => 'We provide free return shipping for defective or incorrect items. For other returns, customers pay return shipping.'], ['q' => 'Can I exchange an item?', 'a' => 'Yes, you can request an exchange for a different size or color within 30 days of purchase.']] as $faq)
                            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                                <button
                                    class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                                    onclick="toggleFAQ(this)">
                                    <span class="font-medium text-gray-900">{{ $faq['q'] }}</span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="px-6 pb-4 hidden">
                                    <p class="text-gray-600">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Still Need Help? -->
                <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-8 text-center">
                    <h2 class="text-2xl font-bold text-white mb-4">Still Need Help?</h2>
                    <p class="text-primary-100 mb-6">Can't find the answer you're looking for? Our support team is ready to
                        help you.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-primary-600 font-medium rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            Contact Support
                        </a>
                        <a href="tel:+15551234567"
                            class="inline-flex items-center justify-center px-6 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white/10 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function toggleFAQ(button) {
                const content = button.nextElementSibling;
                const icon = button.querySelector('svg');

                // Toggle content
                content.classList.toggle('hidden');

                // Rotate icon
                if (content.classList.contains('hidden')) {
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    icon.style.transform = 'rotate(180deg)';
                }
            }

            // FAQ search functionality
            document.querySelector('input[placeholder="Search FAQs..."]').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const faqs = document.querySelectorAll('.bg-white.border');

                faqs.forEach(faq => {
                    const question = faq.querySelector('.font-medium').textContent.toLowerCase();
                    const answer = faq.querySelector('.text-gray-600')?.textContent.toLowerCase() || '';

                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        faq.style.display = 'block';
                    } else {
                        faq.style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
@endsection
