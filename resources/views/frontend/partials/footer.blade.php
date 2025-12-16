<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <a href="{{ route('home') }}" class="flex items-center space-x-2 mb-6">

                    <span class="text-xl font-bold">ToQi - GreenCart</span>
                </a>
                <p class="text-gray-400 mb-6">Your trusted source for fresh organic products since 1997.</p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-6">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Home</a>
                    </li>
                    <li><a href="{{ route('about') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">About
                            Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Shop</a>
                    </li>
                    <li><a href="{{ route('categories.index') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Categories</a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Sellers</a></li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div>
                <h3 class="text-lg font-semibold mb-6">Customer Service</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('contact') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Contact
                            Us</a></li>
                    <li><a href="{{ route('faqs') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">FAQs</a>
                    </li>
                    <li><a href="{{ route('shipping.policy') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Shipping
                            Policy</a></li>
                    <li><a href="{{ route('return.policy') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Return
                            Policy</a></li>
                    <li><a href="{{ route('privacy.policy') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200">Privacy
                            Policy</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-6">Contact Us</h3>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-map-marker-alt text-primary-400"></i>
                        <span class="text-gray-400">123 Uttara, Dhaka - 1230</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-phone text-primary-400"></i>
                        <span class="text-gray-400">+8801-xxxxxxxx</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-primary-400"></i>
                        <span class="text-gray-400">support@greencart.com</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-clock text-primary-400"></i>
                        <span class="text-gray-400">Mon-Fri: 9AM-6PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-800 my-8"></div>

        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; 2025 ToQi - GreenCart. All rights reserved.</p>
            <div class="flex items-center space-x-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa"
                    class="h-4 w-auto opacity-50">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard"
                    class="h-4 w-auto opacity-50">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal"
                    class="h-4 w-auto opacity-50">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Apple_Pay_logo.svg" alt="Apple Pay"
                    class="h-4 w-auto opacity-50">
            </div>
        </div>
    </div>
</footer>
