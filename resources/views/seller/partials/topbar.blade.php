<header class="bg-white border-b border-gray-200">
    <div class="flex items-center justify-between h-16 px-4">
        <!-- Left side: Menu button and breadcrumb -->
        <div class="flex items-center space-x-4">
            <!-- Mobile menu button -->
            <button @click="open = !open"
                class="md:hidden p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100">
                <i class="fas fa-bars text-lg"></i>
            </button>

            <!-- Page Title and Breadcrumb -->
            <div>
                <h1 class="text-xl font-semibold text-gray-900">
                    @hasSection('title')
                        @yield('title')
                    @else
                        Seller Dashboard
                    @endif
                </h1>

                <!-- Breadcrumb -->
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('seller.dashboard') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 transition">
                                <i class="fas fa-tachometer-alt mr-2 text-gray-500"></i>
                                Dashboard
                            </a>
                        </li>
                        @hasSection('breadcrumb')
                            @yield('breadcrumb')
                        @endif
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Right side: Search, notifications, and user menu -->
        <div class="flex items-center space-x-3">
            <!-- Search -->
            <div class="relative hidden md:block">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text"
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 w-64"
                    placeholder="Search products...">
            </div>

            <!-- Notifications -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full relative transition">
                    <i class="fas fa-bell text-lg"></i>
                    @php
                        $notificationCount = auth()
                            ->user()
                            ->sellerOrders()
                            ->whereHas('order', function ($q) {
                                $q->where('status', 'pending');
                            })
                            ->count();
                    @endphp
                    @if ($notificationCount > 0)
                        <span
                            class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    @endif
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <div class="p-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-gray-900">Notifications</h3>
                            <span class="text-xs text-gray-500">{{ now()->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        @php
                            $recentOrders = auth()
                                ->user()
                                ->sellerOrders()
                                ->with('order')
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
                        @endphp

                        @if ($recentOrders->count() > 0)
                            @foreach ($recentOrders as $orderItem)
                                <a href="{{ route('seller.orders.show', $orderItem->order_id) }}"
                                    class="block px-4 py-3 border-b border-gray-100 hover:bg-gray-50 transition">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            @if ($orderItem->order->status == 'pending')
                                                <div
                                                    class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-clock text-yellow-600 text-sm"></i>
                                                </div>
                                            @else
                                                <div
                                                    class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                New order #{{ str_pad($orderItem->order_id, 6, '0', STR_PAD_LEFT) }}
                                            </p>
                                            <p class="text-xs text-gray-500 mt-1">
                                                ${{ number_format($orderItem->total_price, 2) }} •
                                                {{ $orderItem->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="p-4">
                                <p class="text-sm text-gray-500 text-center">No new notifications</p>
                            </div>
                        @endif
                    </div>
                    @if ($recentOrders->count() > 0)
                        <div class="border-t border-gray-200 p-2">
                            <a href="{{ route('seller.orders.index') }}"
                                class="block text-center text-sm text-green-600 hover:text-green-700 font-medium py-2">
                                View all notifications
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- User menu -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 transition">
                    <div class="flex items-center">
                        <div
                            class="w-8 h-8 rounded-full bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                            <span class="text-white text-sm font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </span>
                        </div>
                        <div class="ml-3 text-left hidden md:block">
                            <p class="text-sm font-medium text-gray-900">
                                {{ auth()->user()->business_name ?: auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">
                                <i class="fas fa-store mr-1"></i> Seller
                            </p>
                        </div>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 text-sm"></i>
                    </div>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <div class="py-1">
                        <!-- Seller Info -->
                        <div class="px-4 py-3 border-b border-gray-200">
                            <p class="text-sm font-medium text-gray-900">
                                {{ auth()->user()->business_name ?: auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-store mr-1"></i>
                                {{ auth()->user()->products()->count() }} Products
                            </p>
                        </div>

                        <a href="{{ route('seller.profile.edit') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-user-circle mr-3 text-gray-500"></i>
                            Profile
                        </a>

                        <a href="{{ route('seller.settings') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-cog mr-3 text-gray-500"></i>
                            Settings
                        </a>

                        <a href="{{ route('home') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-store mr-3 text-gray-500"></i>
                            View Store
                        </a>

                        <div class="border-t border-gray-200 my-1"></div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
