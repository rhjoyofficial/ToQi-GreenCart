@extends('seller.layouts.app')

@section('title', 'Add New Product')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Products</span>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Add New Product</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Add New Product</h1>
            <p class="text-gray-600 mt-1">Create a new product listing for your store</p>
        </div>

        <!-- Product Form -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-6 border-b border-gray-200">
                    <!-- Basic Information -->
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Product Name *
                            </label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Enter product name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Category *
                            </label>
                            <select name="category_id" id="category_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description *
                        </label>
                        <textarea name="description" id="description" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Describe your product..."></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pricing & Inventory -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Pricing & Inventory</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                Price (<span class="font-bengali">৳</span>) *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="font-bengali text-gray-500 text-base">৳</span>
                                </div>
                                <input type="number" name="price" id="price" step="0.01" min="0" required
                                    class="pl-10 pr-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    placeholder="0.00">
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock Quantity -->
                        <div>
                            <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                Stock Quantity *
                            </label>
                            <input type="number" name="stock_quantity" id="stock_quantity" min="0" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Enter quantity">
                            @error('stock_quantity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKU (Optional) -->
                        <div>
                            <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">
                                SKU (Optional)
                            </label>
                            <input type="text" name="sku" id="sku"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Product SKU">
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Product Images</h2>

                    <div class="space-y-4">
                        <!-- Main Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Main Product Image *
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                            <span>Upload an image</span>
                                            <input id="image" name="image" type="file" class="sr-only"
                                                accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 2MB
                                    </p>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image Preview</label>
                            <div class="grid grid-cols-3 gap-4">
                                <div id="imagePreview" class="col-span-1">
                                    <!-- Image will appear here after selection -->
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm text-gray-500">No image selected yet. Main image will be displayed
                                        here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status & Settings -->
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Status & Settings</h2>

                    <div class="space-y-4">
                        <!-- Active Status -->
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" checked
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Make this product active immediately
                            </label>
                        </div>

                        <!-- Featured Product -->
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                                Mark as featured product
                            </label>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-8 flex justify-end space-x-3">
                        <a href="{{ route('seller.products.index') }}"
                            class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                            Create Product
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Help Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-lightbulb text-blue-600 text-xl"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-900">Tips for better product listings</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Use clear, high-quality images (recommended size: 800x800px)</li>
                            <li>Write detailed descriptions highlighting key features</li>
                            <li>Set accurate pricing and inventory levels</li>
                            <li>Choose relevant categories for better discoverability</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML = `
                    <div class="relative">
                        <img src="${e.target.result}" alt="Preview" class="w-full h-48 object-cover rounded-lg">
                        <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                `;
                }

                reader.readAsDataURL(file);
            }
        });

        function removeImage() {
            document.getElementById('image').value = '';
            document.getElementById('imagePreview').innerHTML = '<p class="text-sm text-gray-500">No image selected</p>';
        }
    </script>
@endpush
