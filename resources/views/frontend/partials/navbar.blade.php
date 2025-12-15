<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <span class="text-xl font-bold text-gray-800">ToQi - GreenCart</span>
                </a>
            </div>

            <!-- Category Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                @foreach ($navCategories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">
                        {{ $category->name }}
                    </a>
                @endforeach
                <a href="{{ route('products.index') }}"
                    class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">
                    All Products
                </a>
            </div>

            <!-- Search Bar -->
            <div class="hidden lg:flex flex-1 max-w-md mx-8">
                <div class="relative w-full">
                    <input type="text" placeholder="Search products..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <button class="absolute right-0 top-0 h-full px-4 text-gray-400 hover:text-primary-600">
                        <!-- Search SVG Icon -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-4">
                <!-- Wishlist Icon -->
                <a href="#"
                    class="text-gray-700 hover:text-primary-600 transition-colors duration-200 relative group">
                    <!-- Heart SVG Icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                    <!-- Tooltip -->
                    {{-- <span
                        class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                        Wishlist
                    </span> --}}
                </a>

                <!-- Cart Icon -->
                <a href="{{ route('cart.index') }}"
                    class="text-gray-700 hover:text-primary-600 transition-colors duration-200 relative group">
                    <!-- Shopping Cart SVG Icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span
                        class="absolute -top-2 -right-2 bg-primary-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        0
                    </span>
                    <!-- Tooltip -->
                    {{-- <span
                        class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                        Cart
                    </span> --}}
                </a>

                <!-- User Dropdown -->
                <div class="relative group">
                    <!-- User Icon Button -->
                    <button class="text-gray-700 hover:text-primary-600 transition-colors duration-200 relative">
                        <!-- User SVG Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <!-- Tooltip -->
                        {{-- <span
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                            Account
                        </span> --}}
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="absolute right-0 mt-2 w-60 bg-white rounded-md border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="py-2">
                            @auth
                                <!-- Authenticated User Menu -->
                                @if (auth()->user()->isSeller())
                                    <a href="{{ route('seller.dashboard') }}"
                                        class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                        Seller Dashboard
                                    </a>
                                @elseif(auth()->user()->isCustomer())
                                    <a href="{{ route('customer.dashboard') }}"
                                        class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        My Account
                                    </a>
                                @elseif(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Admin Dashboard
                                    </a>
                                @endif

                                <div class="border-t border-gray-200 my-2"></div>

                                <!-- Orders -->
                                <a href="#"
                                    class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                    My Orders
                                </a>

                                <!-- Wishlist -->
                                <a href="#"
                                    class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                    Wishlist
                                </a>

                                <!-- Settings -->
                                <a href="#"
                                    class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Settings
                                </a>

                                <div class="border-t border-gray-200 my-2"></div>

                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2.5 text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            @else
                                <!-- Guest User Menu -->
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Sign In
                                </a>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2.5 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                        </path>
                                    </svg>
                                    Sign Up
                                </a>
                                <div class="border-t border-gray-200 my-2"></div>
                                <a href="{{ route('seller.register') }}"
                                    class="block px-4 py-2.5 text-primary-600 hover:bg-primary-50 hover:text-primary-700 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    Become a Seller
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden">
                <!-- Hamburger Menu SVG Icon -->
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Search -->
        <div class="lg:hidden mt-4 pb-4">
            <div class="relative">
                <input type="text" placeholder="Search products..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                <button class="absolute right-0 top-0 h-full px-4 text-gray-400 hover:text-primary-600">
                    <!-- Search SVG Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('home') }}"
                    class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">
                    Home
                </a>
                @foreach ($navCategories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
            <!-- Mobile Auth Links -->
            <div class="mt-4 pt-4 border-t border-gray-200">
                @auth
                    <div class="space-y-2">
                        @if (auth()->user()->isSeller())
                            <a href="{{ route('seller.dashboard') }}"
                                class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                Seller Dashboard
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 hover:text-red-700 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('login') }}"
                            class="px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 text-center">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-3 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 text-center">
                            Sign Up
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
