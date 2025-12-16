<footer class="bg-white border-t border-gray-200 py-4">
    <div class="max-w-8xl mx-auto px-4 md:px-6">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="text-sm text-gray-600 mb-2 md:mb-0">
                &copy; {{ date('Y') }} {{ config('app.name', 'Green Cart') }} Admin Panel
                <span class="mx-2">•</span>
                <span class="text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded">
                    v{{ config('app.version', '1.0.0') }}
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500 hidden md:inline">
                    <i class="fas fa-server mr-1"></i>
                    Server: {{ gethostname() }}
                </span>
                <span class="text-gray-400 hidden md:inline">•</span>
                <a href="{{ route('admin.settings.general') }}"
                    class="text-sm text-gray-600 hover:text-gray-900">System</a>
                <span class="text-gray-400">•</span>
                <a href="{{ route('privacy') }}" class="text-sm text-gray-600 hover:text-gray-900">Privacy</a>
                <span class="text-gray-400">•</span>
                <span class="text-sm text-gray-500">
                    {{ now()->format('h:i A') }}
                </span>
            </div>
        </div>
    </div>
</footer>
