<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <title>
        @hasSection('title')
            {{ config('app.name', 'Green Cart') }} - @yield('title')
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Bengali:wght@100..900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <!-- Core Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-inter antialiased bg-gray-50">
    <!-- Navbar -->
    @include('frontend.partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('frontend.partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // Initialize Swiper
        document.addEventListener('DOMContentLoaded', function() {
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Add to cart functionality
            $('.add-to-cart').on('click', function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');

                $.ajax({
                    url: '/cart/add',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update cart count
                            $('.cart-count').text(response.cart_count);

                            // Show success message
                            showToast('Product added to cart successfully!', 'success');
                        }
                    },
                    error: function(xhr) {
                        showToast('Error adding product to cart', 'error');
                    }
                });
            });

            function showToast(message, type) {
                // Create toast element
                const toast = $(`
                    <div class="fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transition-all duration-300 transform translate-x-full">
                        ${message}
                    </div>
                `);

                // Set color based on type
                if (type === 'success') {
                    toast.addClass('bg-green-500');
                } else {
                    toast.addClass('bg-red-500');
                }

                // Add to body and animate
                $('body').append(toast);
                setTimeout(() => {
                    toast.removeClass('translate-x-full');
                    toast.addClass('translate-x-0');
                }, 10);

                // Remove after 3 seconds
                setTimeout(() => {
                    toast.removeClass('translate-x-0');
                    toast.addClass('translate-x-full');
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }
        });
    </script>
    <script>
        // Update cart count from local storage
        function updateCartCount() {
            const cartCount = localStorage.getItem('cartCount') || 0;
            $('.cart-count').text(cartCount);
        }

        // Initialize cart count on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();

            // Add to cart functionality
            $('.add-to-cart').on('click', function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');

                // Get current cart count
                let cartCount = parseInt(localStorage.getItem('cartCount') || 0);
                cartCount++;
                localStorage.setItem('cartCount', cartCount);

                // Update cart count display
                updateCartCount();

                // Show success message
                showToast('Product added to cart successfully!', 'success');
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
