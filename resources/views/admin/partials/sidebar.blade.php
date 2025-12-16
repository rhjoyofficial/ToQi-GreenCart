<aside class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-white border-r border-gray-200">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Application Logo') }}"
                        class="h-6 w-auto object-contain" loading="lazy">
                </div>
                <div>
                    <span class="text-xl font-bold text-gray-900">Admin Panel</span>
                    <p class="text-xs text-gray-500">GreenCart</p>
                </div>
            </a>
        </div>

        <!-- Navigation -->
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <nav class="flex-1 px-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Dashboard
                </a>

                <!-- Management Section -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Management</p>
                </div>

                <!-- Users -->
                <a href="{{ route('admin.users.index') }}"
                    class="{{ request()->routeIs('admin.users.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-users mr-3 {{ request()->routeIs('admin.users.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Users
                    @php
                        $newUsers = \App\Models\User::where('created_at', '>=', now()->subDays(7))->count();
                    @endphp
                    @if ($newUsers > 0)
                        <span class="ml-auto bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $newUsers }} new
                        </span>
                    @endif
                </a>

                <!-- Products -->
                <a href="{{ route('admin.products.index') }}"
                    class="{{ request()->routeIs('admin.products.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-box mr-3 {{ request()->routeIs('admin.products.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Products
                    @php
                        $pendingProducts = \App\Models\Product::where('is_active', false)->count();
                    @endphp
                    @if ($pendingProducts > 0)
                        <span
                            class="ml-auto bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $pendingProducts }}
                        </span>
                    @endif
                </a>

                <!-- Categories -->
                <a href="{{ route('admin.categories.index') }}"
                    class="{{ request()->routeIs('admin.categories.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-tags mr-3 {{ request()->routeIs('admin.categories.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Categories
                </a>

                <!-- Orders -->
                <a href="{{ route('admin.orders.index') }}"
                    class="{{ request()->routeIs('admin.orders.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-shopping-cart mr-3 {{ request()->routeIs('admin.orders.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Orders
                    @php
                        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
                    @endphp
                    @if ($pendingOrders > 0)
                        <span class="ml-auto bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $pendingOrders }}
                        </span>
                    @endif
                </a>

                <!-- Sellers -->
                <a href="{{ route('admin.sellers.index') }}"
                    class="{{ request()->routeIs('admin.sellers.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-store mr-3 {{ request()->routeIs('admin.sellers.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Sellers
                    @php
                        $pendingSellers = \App\Models\User::where('role_id', 2)->where('is_active', false)->count();
                    @endphp
                    @if ($pendingSellers > 0)
                        <span
                            class="ml-auto bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $pendingSellers }}
                        </span>
                    @endif
                </a>

                <!-- Analytics Section -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Analytics</p>
                </div>

                <a href="{{ route('admin.analytics.sales') }}"
                    class="{{ request()->routeIs('admin.analytics.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-chart-line mr-3 {{ request()->routeIs('admin.analytics.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Sales Analytics
                </a>

                <a href="{{ route('admin.analytics.products') }}"
                    class="{{ request()->routeIs('admin.analytics.products') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-chart-bar mr-3 {{ request()->routeIs('admin.analytics.products') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Product Analytics
                </a>

                <!-- Settings Section -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Settings</p>
                </div>

                <a href="{{ route('admin.settings.general') }}"
                    class="{{ request()->routeIs('admin.settings.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-cog mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Settings
                </a>

                <a href="{{ route('admin.reports.index') }}"
                    class="{{ request()->routeIs('admin.reports.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                    <i
                        class="fas fa-file-alt mr-3 {{ request()->routeIs('admin.reports.*') ? 'text-green-500' : 'text-gray-500 group-hover:text-gray-600' }}"></i>
                    Reports
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="mt-auto px-4 py-4">
                <div class="p-3 bg-gray-50 rounded-lg">
                    <p class="text-xs text-gray-600 mb-1">System Status</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-xs text-green-700 font-medium">Online</span>
                        </div>
                        <span class="text-xs text-gray-500">{{ now()->format('M d, Y') }}</span>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('home') }}"
                        class="flex items-center text-sm text-gray-600 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Store
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
