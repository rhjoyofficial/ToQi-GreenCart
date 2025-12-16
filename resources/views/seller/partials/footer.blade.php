<footer class="bg-white border-t border-gray-200 py-4">
    <div class="max-w-8xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="text-sm text-gray-600 mb-2 md:mb-0">
                &copy; {{ date('Y') }} {{ config('app.name', 'Green Cart') }} Seller Panel
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500">
                    <i class="fas fa-chart-line mr-1"></i>
                    {{ auth()->user()->products()->where('is_active', true)->count() }} Active Products
                </span>
                <span class="text-gray-400">•</span>
                <a href="{{ route('contact') }}" class="text-sm text-gray-600 hover:text-gray-900">Support</a>
                <span class="text-gray-400">•</span>
                <span class="text-sm text-gray-500">v1.0.0</span>
            </div>
        </div>
    </div>
</footer>
