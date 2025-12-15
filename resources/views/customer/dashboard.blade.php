@extends('layouts.app')

@section('title', 'Home')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Home</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Hello, {{ auth()->user()->name }}!</h2>
                    <p class="text-green-100">Discover fresh organic products from local sellers</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <i class="fas fa-leaf text-3xl"></i>
                </div>
            </div>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('customer.products.index') }}"
                    class="bg-white/20 hover:bg-white/30 rounded-lg p-4 text-center transition">
                    <i class="fas fa-store text-2xl mb-2"></i>
                    <p class="font-medium">Browse Products</p>
                </a>
                <a href="{{ route('customer.cart.index') }}"
                    class="bg-white/20 hover:bg-white/30 rounded-lg p-4 text-center transition">
                    <i class="fas fa-shopping-cart text-2xl mb-2"></i>
                    <p class="font-medium">View Cart</p>
                    @if ($cartCount = auth()->user()->cart?->items()->count())
                        <span
                            class="absolute top-2 right-2 bg-white text-green-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('customer.orders.index') }}"
                    class="bg-white/20 hover:bg-white/30 rounded-lg p-4 text-center transition">
                    <i class="fas fa-clipboard-list text-2xl mb-2"></i>
                    <p class="font-medium">My Orders</p>
                </a>
            </div>
        </div>

        <!-- Featured Products -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Featured Organic Products</h2>
                <a href="{{ route('customer.products.index') }}"
                    class="text-sm text-green-600 hover:text-green-700 font-medium">
                    View all →
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $featuredProducts = \App\Models\Product::where('is_active', true)
                        ->with('seller', 'category')
                        ->inRandomOrder()
                        ->take(4)
                        ->get();
                @endphp
                @forelse($featuredProducts as $product)
                    <div class="group border border-gray-200 rounded-xl hover:border-green-500 hover:shadow-md transition">
                        <div class="p-4">
                            <div class="w-full h-40 bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                @if ($product->images->where('is_primary', true)->first())
                                    <img src="{{ $product->images->where('is_primary', true)->first()->image_url }}"
                                        alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                                @else
                                    <i class="fas fa-carrot text-4xl text-green-600"></i>
                                @endif
                            </div>
                            <div class="mb-3">
                                <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-green-700 transition mb-2">
                                {{ $product->name }}
                            </h3>
                            <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ Str::limit($product->description, 60) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</p>
                                    <p class="text-xs text-gray-500">By {{ $product->seller->name }}</p>
                                </div>
                                <button class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-8">
                        <i class="fas fa-box-open text-3xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No products available at the moment</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Orders & Cart Summary -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Orders</h2>
                    <a href="{{ route('customer.orders.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View all →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse(auth()->user()->orders()->latest()->take(3)->get() as $order)
                        <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <span class="font-medium text-gray-900">Order
                                        #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                                    <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                </div>
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'paid' => 'bg-blue-100 text-blue-800',
                                        'processing' => 'bg-purple-100 text-purple-800',
                                        'shipped' => 'bg-indigo-100 text-indigo-800',
                                        'delivered' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                @endphp
                                <span
                                    class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">{{ $order->items->count() }} items</span>
                                <span
                                    class="font-medium text-gray-900">${{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-shopping-bag text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">No orders yet</p>
                            <a href="{{ route('customer.products.index') }}"
                                class="text-sm text-green-600 hover:text-green-700 mt-2 inline-block">
                                Start shopping →
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Shopping Cart</h2>
                    <a href="{{ route('customer.cart.index') }}"
                        class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View cart →
                    </a>
                </div>
                @if (auth()->user()->cart && auth()->user()->cart->items->count() > 0)
                    <div class="space-y-4">
                        @foreach (auth()->user()->cart->items()->with('product')->take(3)->get() as $item)
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-carrot text-green-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">{{ $item->product->name }}</h4>
                                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium text-gray-900">
                                        ${{ number_format($item->unit_price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                        @endforeach

                        @if (auth()->user()->cart->items->count() > 3)
                            <div class="text-center text-sm text-gray-500">
                                + {{ auth()->user()->cart->items->count() - 3 }} more items
                            </div>
                        @endif

                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium text-gray-900">
                                    ${{ number_format(
                                        auth()->user()->cart->items->sum(function ($item) {
                                                return $item->unit_price * $item->quantity;
                                            }),
                                        2,
                                    ) }}
                                </span>
                            </div>
                            <a href="{{ route('customer.cart.index') }}"
                                class="w-full bg-green-600 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-green-700 text-center block transition">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-shopping-cart text-3xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Your cart is empty</p>
                        <a href="{{ route('customer.products.index') }}"
                            class="text-sm text-green-600 hover:text-green-700 mt-2 inline-block">
                            Browse products →
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Shop by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $categories = \App\Models\Category::inRandomOrder()->take(6)->get();
                @endphp
                @foreach ($categories as $category)
                    <a href="{{ route('customer.products.index', ['category' => $category->id]) }}"
                        class="group border border-gray-200 rounded-xl p-4 text-center hover:border-green-500 hover:bg-green-50 transition">
                        <div
                            class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-green-200 transition">
                            <i class="fas fa-seedling text-green-600"></i>
                        </div>
                        <p class="font-medium text-gray-900 group-hover:text-green-700 transition">{{ $category->name }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            {{ $category->products()->where('is_active', true)->count() }} products
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
