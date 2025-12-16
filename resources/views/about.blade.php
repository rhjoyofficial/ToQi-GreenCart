@extends('frontend.layouts.app')

@section('title', 'About Us - GreenCart')

@section('content')
    <div class="py-12 px-4">
        <div class="max-w-8xl mx-auto">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900 mb-6">About GreenCart</h1>
                <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                    We're building a bridge between conscious consumers and local organic producers to create
                    a sustainable marketplace that benefits everyone.
                </p>
            </div>

            <!-- Mission & Vision -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-2xl text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                    <p class="text-gray-600 mb-4">
                        To make organic, locally-sourced products accessible to everyone while supporting
                        sustainable farming practices and local economies.
                    </p>
                    <p class="text-gray-600">
                        We believe in creating a transparent supply chain where consumers know exactly where
                        their food comes from and farmers get fair prices for their hard work.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-2xl text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h2>
                    <p class="text-gray-600 mb-4">
                        To become the leading platform connecting local organic producers with conscious
                        consumers nationwide, revolutionizing how people access healthy food.
                    </p>
                    <p class="text-gray-600">
                        We envision a future where every community has access to fresh, organic products
                        while supporting sustainable agriculture and reducing food miles.
                    </p>
                </div>
            </div>

            <!-- Story -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Story</h2>
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="prose max-w-none">
                        <p class="text-gray-600 mb-4">
                            GreenCart was founded in 2023 by a group of passionate individuals who recognized
                            the gap between local organic producers and consumers seeking healthy, sustainable options.
                        </p>
                        <p class="text-gray-600 mb-4">
                            After witnessing the challenges faced by small-scale farmers and the limited access
                            consumers had to truly fresh, organic products, we set out to create a solution.
                        </p>
                        <p class="text-gray-600">
                            Today, GreenCart connects hundreds of local sellers with thousands of customers
                            across the region, helping build stronger communities and promoting healthier lifestyles.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Values -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ([['Sustainability', 'fas fa-leaf', 'We prioritize eco-friendly practices and promote sustainable agriculture'], ['Transparency', 'fas fa-chart-line', 'Full visibility into product sourcing and supply chain'], ['Community', 'fas fa-users', 'Building strong connections between producers and consumers'], ['Quality', 'fas fa-award', 'Only certified organic and highest quality products'], ['Fairness', 'fas fa-balance-scale', 'Fair prices for both producers and consumers'], ['Innovation', 'fas fa-lightbulb', 'Constantly improving our platform and services']] as $value)
                        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="{{ $value[1] }} text-green-600"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">{{ $value[0] }}</h3>
                            <p class="text-sm text-gray-600">{{ $value[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Team (Optional) -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Meet Our Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ([['Alex Johnson', 'Founder & CEO', '10+ years in sustainable agriculture'], ['Maria Garcia', 'Head of Operations', 'Supply chain and logistics expert'], ['David Chen', 'Technology Director', 'Platform development and innovation']] as $member)
                        <div class="text-center">
                            <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                            <h3 class="font-bold text-gray-900 text-lg">{{ $member[0] }}</h3>
                            <p class="text-green-600 font-medium mb-1">{{ $member[1] }}</p>
                            <p class="text-sm text-gray-600">{{ $member[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl p-8 text-center text-white">
                <h2 class="text-2xl font-bold mb-4">Join Our Community</h2>
                <p class="mb-6 opacity-90">
                    Whether you're a consumer looking for fresh organic products or a seller wanting to reach more
                    customers,
                    GreenCart is the place for you.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register', ['role' => 'customer']) }}"
                        class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Shop Organic
                    </a>
                    <a href="{{ route('register', ['role' => 'seller']) }}"
                        class="bg-transparent border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white/10 transition">
                        Sell Your Products
                    </a>
                    <a href="{{ route('contact') }}"
                        class="bg-transparent border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white/10 transition">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
