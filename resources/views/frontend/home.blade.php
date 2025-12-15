@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    @include('frontend.sections.hero')

    <!-- Categories Section -->
    @include('frontend.sections.categories')

    <!-- Products Section -->
    @include('frontend.sections.products')

    <!-- Featured Seller Products Slider -->
    @if ($featuredSeller && $featuredSellerProducts->count() > 0)
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Featured Seller</h2>
                    <p class="text-gray-600">Discover amazing products from our top-rated sellers</p>
                </div>

                <!-- Use the seller products slider component -->
                <x-seller-products-slider :seller="$featuredSeller" :products="$featuredSellerProducts" />
            </div>
        </section>
    @endif

    <!-- Sellers Section -->
    @include('frontend.sections.sellers')

    <!-- Newsletter Section -->
    @include('frontend.sections.newsletter')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize individual seller product sliders
            document.querySelectorAll('.seller-slider').forEach(slider => {
                const swiper = new Swiper(slider, {
                    slidesPerView: 1,
                    spaceBetween: 16,
                    navigation: {
                        nextEl: slider.closest('.relative').querySelector('.seller-slider-next'),
                        prevEl: slider.closest('.relative').querySelector('.seller-slider-prev'),
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        1024: {
                            slidesPerView: 4,
                        },
                        1280: {
                            slidesPerView: 5,
                        },
                    },
                });
            });

            // Initialize multiple sellers slider
            const multiSellerSlider = new Swiper('.multi-seller-slider', {
                slidesPerView: 1,
                spaceBetween: 24,
                navigation: {
                    nextEl: '.multi-seller-next',
                    prevEl: '.multi-seller-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
        });
    </script>
@endpush
