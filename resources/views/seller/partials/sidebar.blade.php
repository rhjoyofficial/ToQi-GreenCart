<aside class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-white border-r border-gray-200">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <a href="{{ route('seller.dashboard') }}" class="flex items-center space-x-3">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Application Logo') }}"
                        class="h-6 w-auto object-contain" loading="lazy">
                </div>
                <span class="text-xl font-bold text-gray-900">Seller Panel</span>
            </a>
        </div>

        <!-- Navigation -->
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <nav class="flex-1 px-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('seller.dashboard') }}"
                    class="{{ request()->routeIs('seller.dashboard') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-tachometer-alt mr-3 text-gray-500 {{ request()->routeIs('seller.dashboard') ? 'text-green-500' : '' }}"></i>
                    Dashboard
                </a>

                <!-- Products Section -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Products</p>
                </div>

                <a href="{{ route('seller.products.index') }}"
                    class="{{ request()->routeIs('seller.products.index') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-box mr-3 text-gray-500 {{ request()->routeIs('seller.products.index') ? 'text-green-500' : '' }}"></i>
                    My Products
                    @php
                        $pendingProducts = auth()->user()->products()->where('is_active', false)->count();
                    @endphp
                    @if ($pendingProducts > 0)
                        <span
                            class="ml-auto bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $pendingProducts }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('seller.products.create') }}"
                    class="{{ request()->routeIs('seller.products.create') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-plus-circle mr-3 text-gray-500 {{ request()->routeIs('seller.products.create') ? 'text-green-500' : '' }}"></i>
                    Add Product
                </a>

                <!-- Orders Section -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Orders</p>
                </div>

                <a href="{{ route('seller.orders.index') }}"
                    class="{{ request()->routeIs('seller.orders.index') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-shopping-cart mr-3 text-gray-500 {{ request()->routeIs('seller.orders.index') ? 'text-green-500' : '' }}"></i>
                    All Orders
                    @php
                        $pendingOrders = auth()
                            ->user()
                            ->sellerOrders()
                            ->whereHas('order', function ($q) {
                                $q->where('status', 'pending');
                            })
                            ->count();
                    @endphp
                    @if ($pendingOrders > 0)
                        <span class="ml-auto bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $pendingOrders }}
                        </span>
                    @endif
                </a>

                <!-- Analytics Section -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Analytics</p>
                </div>

                <a href="{{ route('seller.analytics.sales') }}"
                    class="{{ request()->routeIs('seller.analytics.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-chart-line mr-3 text-gray-500 {{ request()->routeIs('seller.analytics.*') ? 'text-green-500' : '' }}"></i>
                    Sales Analytics
                </a>

                <!-- Back to Store -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Store</p>
                </div>

                <a href="{{ route('home') }}"
                    class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                    <i class="fas fa-store mr-3 text-gray-500"></i>
                    View Store
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="mt-auto px-4 py-4">
                <div class="p-3 bg-gray-50 rounded-lg">
                    <p class="text-xs text-gray-600 mb-1">Need help?</p>
                    <a href="{{ route('contact') }}" class="text-sm text-green-600 hover:text-green-700 font-medium">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
