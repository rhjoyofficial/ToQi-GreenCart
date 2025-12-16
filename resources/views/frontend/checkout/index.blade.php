@extends('frontend.layouts.app')

@section('title', 'Checkout - GreenCart')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center">
                            1
                        </div>
                        <div class="ml-2 text-sm font-medium text-primary-600">Cart</div>
                    </div>
                    <div class="w-24 h-1 bg-primary-600 mx-4"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center">
                            2
                        </div>
                        <div class="ml-2 text-sm font-medium text-primary-600">Information</div>
                    </div>
                    <div class="w-24 h-1 bg-primary-600 mx-4"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center">
                            3
                        </div>
                        <div class="ml-2 text-sm font-medium text-primary-600">Payment</div>
                    </div>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

            <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Forms -->
                    <div class="lg:col-span-2">
                        <!-- Contact Information -->
                        <div class="bg-white rounded-xl shadow-sm mb-6">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900">Contact Information</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                        <input type="text" name="name" required placeholder="Enter Your Full Name"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" name="email" placeholder="Enter Your Email Address"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                        <input type="tel" name="phone" required placeholder="Enter Your Phone Number"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                        <div class="bg-white rounded-xl shadow-sm mb-6">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900">Shipping Address</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                                        <input type="text" name="address" required placeholder="Street address"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                        <input type="text" name="city" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                        <input type="text" name="state" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Postal Code *</label>
                                        <input type="text" name="postal_code" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                                        <select name="country" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            <option value="">Select Country</option>
                                            <option value="bn" selected>Bangladesh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="bg-white rounded-xl shadow-sm">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900">Payment Method</h2>
                            </div>
                            <div class="p-6">
                                <!-- Credit/Debit Card -->
                                <div class="mb-6">
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="payment_method" value="card" id="cardPayment"
                                            class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300" checked>
                                        <label for="cardPayment" class="ml-3 block text-sm font-medium text-gray-700">
                                            Credit/Debit Card
                                        </label>
                                        <div class="ml-auto flex space-x-2">
                                            <i class="fab fa-cc-visa text-2xl text-gray-400"></i>
                                            <i class="fab fa-cc-mastercard text-2xl text-gray-400"></i>
                                            <i class="fab fa-cc-amex text-2xl text-gray-400"></i>
                                        </div>
                                    </div>

                                    <!-- Card Details (shown when card is selected) -->
                                    <div id="cardDetails" class="ml-8 space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Card Number
                                                *</label>
                                            <input type="text" name="card_number" placeholder="1234 5678 9012 3456"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date
                                                    *</label>
                                                <input type="text" name="expiry_date" placeholder="MM/YY"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">CVV *</label>
                                                <input type="text" name="cvv" placeholder="123"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Name on Card
                                                *</label>
                                            <input type="text" name="card_name" placeholder="John Doe"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                        </div>
                                    </div>
                                </div>

                                <!-- PayPal -->
                                <div class="mb-6">
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="payment_method" value="paypal" id="paypalPayment"
                                            class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300">
                                        <label for="paypalPayment" class="ml-3 block text-sm font-medium text-gray-700">
                                            PayPal
                                        </label>
                                        <div class="ml-auto">
                                            <i class="fab fa-cc-paypal text-3xl text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cash on Delivery -->
                                <div>
                                    <div class="flex items-center">
                                        <input type="radio" name="payment_method" value="cod" id="codPayment"
                                            class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300">
                                        <label for="codPayment" class="ml-3 block text-sm font-medium text-gray-700">
                                            Cash on Delivery
                                        </label>
                                        <div class="ml-auto">
                                            <i class="fas fa-money-bill-wave text-2xl text-gray-400"></i>
                                        </div>
                                    </div>
                                    <p class="ml-8 mt-2 text-sm text-gray-600">Pay with cash when your order is delivered.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-sm sticky top-24">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900">Order Summary</h2>
                            </div>

                            <!-- Order Items -->
                            <div class="p-6 max-h-96 overflow-y-auto">
                                @foreach ($cartItems as $item)
                                    <div class="flex items-center py-4 border-b border-gray-100 last:border-0">
                                        <div class="flex-shrink-0 w-16 h-16">
                                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                                                class="w-full h-full object-cover rounded-lg">
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h4>
                                            <div class="flex items-center justify-between mt-1">
                                                <span class="text-sm text-gray-500">Qty: {{ $item->quantity }}</span>
                                                <span class="font-medium"><span
                                                        class="font-bengali">৳</span>{{ number_format($item->total_price, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Order Totals -->
                            <div class="p-6 border-t border-gray-200">
                                <div class="space-y-3">
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
                                    <div class="border-t border-gray-200 pt-3">
                                        <div class="flex justify-between text-lg font-bold">
                                            <span>Total</span>
                                            <span><span class="font-bengali">৳</span>{{ number_format($total, 2) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="mt-6">
                                    <div class="flex items-start">
                                        <input type="checkbox" id="terms" required
                                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded mt-1">
                                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                                            I agree to the <a href="#"
                                                class="text-primary-600 hover:text-primary-700">Terms and Conditions</a>
                                            and <a href="#" class="text-primary-600 hover:text-primary-700">Privacy
                                                Policy</a>
                                        </label>
                                    </div>
                                </div>

                                <!-- Place Order Button -->
                                <button type="submit"
                                    class="mt-6 w-full px-6 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 shadow-lg hover:shadow-xl flex items-center justify-center">
                                    <i class="fas fa-lock mr-2"></i>
                                    Place Order
                                </button>

                                <!-- Security Info -->
                                <div class="mt-6 text-center">
                                    <div class="flex items-center justify-center text-sm text-gray-600">
                                        <i class="fas fa-shield-alt text-green-500 mr-2"></i>
                                        <span>Secure SSL Encryption</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Need Help -->
                        <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
                            <h3 class="font-semibold text-gray-900 mb-3">Need Help with Checkout?</h3>
                            <div class="space-y-3">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-phone-alt text-primary-600 mr-3"></i>
                                    <span>+88017-xxxxxxxxxxx</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-envelope text-primary-600 mr-3"></i>
                                    <span>support@greencart.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cardPayment = document.getElementById('cardPayment');
                const cardDetails = document.getElementById('cardDetails');

                function toggleCardDetails() {
                    if (cardPayment.checked) {
                        cardDetails.style.display = 'block';
                    } else {
                        cardDetails.style.display = 'none';
                    }
                }

                // Initial toggle
                toggleCardDetails();

                // Add event listeners to all payment method radios
                document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                    radio.addEventListener('change', toggleCardDetails);
                });

                // Form validation
                document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                    const terms = document.getElementById('terms');
                    if (!terms.checked) {
                        e.preventDefault();
                        alert('Please agree to the Terms and Conditions');
                        terms.focus();
                    }
                });
            });
        </script>
    @endpush
@endsection
