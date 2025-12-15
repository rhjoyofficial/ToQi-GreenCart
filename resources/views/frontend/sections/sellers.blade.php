<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Sellers</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Shop directly from our trusted organic sellers and farmers</p>
        </div>

        <!-- Sellers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Seller 1 -->
            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Seller" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Green Valley Farms</h3>
                        <p class="text-gray-600 text-sm">Organic Vegetables</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-600 text-sm ml-2">4.5 (120 reviews)</span>
                    </div>
                    <p class="text-gray-700 text-sm">Specializing in fresh organic vegetables grown locally.</p>
                </div>
                <a href="#"
                    class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium text-sm">
                    <span>Visit Store</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Seller 2 -->
            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow">
                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Seller" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Fruit Garden</h3>
                        <p class="text-gray-600 text-sm">Seasonal Fruits</p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-600 text-sm ml-2">5.0 (95 reviews)</span>
                    </div>
                    <p class="text-gray-700 text-sm">Best quality seasonal fruits from our orchards.</p>
                </div>
                <a href="#"
                    class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium text-sm">
                    <span>Visit Store</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Add more sellers as needed -->
        </div>

        <!-- Become a Seller CTA -->
        <div class="mt-16 bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-8 text-center">
            <h3 class="text-2xl font-bold text-white mb-4">Want to Sell on GreenCart?</h3>
            <p class="text-primary-100 mb-6 max-w-2xl mx-auto">Join our community of sellers and reach thousands of
                customers looking for organic products.</p>
            <a href="{{ route('register', ['role' => 'seller']) }}"
                class="inline-flex items-center px-6 py-3 bg-white text-primary-600 font-medium rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <span>Become a Seller</span>
                <i class="fas fa-user-plus ml-2"></i>
            </a>
        </div>
    </div>
</section>
