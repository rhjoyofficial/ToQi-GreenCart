<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Shop by Categories</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Browse through our wide range of product categories</p>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category->slug) }}"
                    class="group relative overflow-hidden rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 animate-slide-up">
                    <div class="aspect-square overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="{{ $category->name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                        </div>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-lg font-semibold text-white">{{ $category->name }}</h3>
                        <p class="text-white/80 text-sm mt-1">{{ $category->products_count ?? 0 }} products</p>
                    </div>
                    <div class="absolute top-4 right-4">
                        <div
                            class="w-10 h-10 bg-white/90 rounded-full flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="{{ route('categories.index') }}"
                class="inline-flex items-center px-6 py-3 border-2 border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 transition-colors duration-200">
                <span>View All Categories</span>
                <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
