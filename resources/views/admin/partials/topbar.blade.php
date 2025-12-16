<header class="bg-white border-b border-gray-200">
    <div class="flex items-center justify-between h-16 px-4 md:px-6">
        <!-- Left side: Menu button and title -->
        <div class="flex items-center space-x-4">
            <!-- Mobile menu button -->
            <button id="mobileMenuButton"
                class="md:hidden p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100">
                <i class="fas fa-bars text-lg"></i>
            </button>

            <!-- Page Title -->
            <div>
                <h1 class="text-lg md:text-xl font-semibold text-gray-900">
                    @hasSection('title')
                        @yield('title')
                    @else
                        Admin Dashboard
                    @endif
                </h1>
                <p class="text-sm text-gray-600 hidden md:block">
                    @php
                        $greetings = ['Good morning', 'Good afternoon', 'Good evening'];
                        $hour = date('H');
                        $greeting = $hour < 12 ? $greetings[0] : ($hour < 18 ? $greetings[1] : $greetings[2]);
                    @endphp
                    {{ $greeting }}, {{ auth()->user()->name }}
                </p>
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
                    placeholder="Search admin panel...">
            </div>

            <!-- Quick Actions Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-bolt text-lg"></i>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <div class="p-3 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('admin.products.create') }}"
                            class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-plus-circle text-green-500 mr-3"></i>
                            Add Product
                        </a>
                        <a href="{{ route('admin.users.create') }}"
                            class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-user-plus text-blue-500 mr-3"></i>
                            Add User
                        </a>
                        <a href="{{ route('admin.orders.index') }}?status=pending"
                            class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-clipboard-list text-yellow-500 mr-3"></i>
                            View Pending Orders
                        </a>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full relative transition">
                    <i class="fas fa-bell text-lg"></i>
                    @php
                        $totalNotifications =
                            \App\Models\Order::where('status', 'pending')->count() +
                            \App\Models\User::where('role_id', 2)->where('is_active', false)->count() +
                            \App\Models\Product::where('is_active', false)->count();
                    @endphp
                    @if ($totalNotifications > 0)
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
                            <span class="text-xs text-gray-500">{{ now()->format('M d') }}</span>
                        </div>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        @php
                            $pendingOrders = \App\Models\Order::where('status', 'pending')->latest()->take(3)->get();
                            $pendingSellers = \App\Models\User::where('role_id', 2)
                                ->where('is_active', false)
                                ->latest()
                                ->take(2)
                                ->get();
                            $pendingProducts = \App\Models\Product::where('is_active', false)->latest()->take(2)->get();
                        @endphp

                        @if ($pendingOrders->count() > 0)
                            <div class="px-4 py-2">
                                <p class="text-xs font-medium text-gray-500 mb-2">Pending Orders</p>
                                @foreach ($pendingOrders as $order)
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="flex items-center px-3 py-2 hover:bg-gray-50 rounded-lg transition mb-2">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-shopping-cart text-yellow-600 text-sm"></i>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                ৳{{ number_format($order->total_amount, 2) }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        @if ($totalNotifications == 0)
                            <div class="p-4">
                                <p class="text-sm text-gray-500 text-center">No new notifications</p>
                            </div>
                        @endif
                    </div>
                    @if ($totalNotifications > 0)
                        <div class="border-t border-gray-200 p-2">
                            <a href="{{ route('admin.notifications') }}"
                                class="block text-center text-sm text-green-600 hover:text-green-700 font-medium py-2">
                                View all notifications ({{ $totalNotifications }})
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- User menu -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition">
                    <div class="flex items-center">
                        <div
                            class="w-8 h-8 rounded-full bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                            <span class="text-white text-sm font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </span>
                        </div>
                        <div class="ml-2 text-left hidden md:block">
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                        <i class="fas fa-chevron-down ml-2 text-gray-500 text-sm"></i>
                    </div>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <div class="py-1">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ auth()->user()->email }}</p>
                        </div>

                        <a href="{{ route('admin.profile') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-user-circle mr-3 text-gray-500"></i>
                            Profile
                        </a>

                        <a href="{{ route('admin.settings.general') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-cog mr-3 text-gray-500"></i>
                            Settings
                        </a>

                        <a href="{{ route('admin.activity') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-history mr-3 text-gray-500"></i>
                            Activity Log
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

<!-- Mobile Sidebar (hidden by default) -->
<div id="mobileSidebar" class="md:hidden hidden fixed inset-0 z-50">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" onclick="toggleMobileSidebar()"></div>

    <!-- Sidebar Content -->
    <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
            <div class="flex-shrink-0 flex items-center px-4">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-6 w-auto">
                    </div>
                    <span class="text-xl font-bold text-gray-900">Admin Panel</span>
                </div>
                <button onclick="toggleMobileSidebar()"
                    class="ml-auto p-2 rounded-md text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="mt-5 px-2 space-y-1">
                <!-- Mobile navigation items (same as sidebar but simplified) -->
                <a href="{{ route('admin.dashboard') }}"
                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-tachometer-alt mr-4 text-gray-400"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-users mr-4 text-gray-400"></i>
                    Users
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-box mr-4 text-gray-400"></i>
                    Products
                </a>
                <a href="{{ route('admin.orders.index') }}"
                    class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-shopping-cart mr-4 text-gray-400"></i>
                    Orders
                </a>
            </nav>
        </div>
    </div>
</div>

<script>
    function toggleMobileSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        sidebar.classList.toggle('hidden');
    }

    document.getElementById('mobileMenuButton').addEventListener('click', toggleMobileSidebar);
</script>
