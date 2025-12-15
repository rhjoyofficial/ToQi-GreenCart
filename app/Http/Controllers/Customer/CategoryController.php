<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('frontend.categories.index', compact('categories'));
    }

    public function show(Request $request, $slug)
    {
        // Get the category
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get sellers who have products in this category
        $sellers = User::where('role_id', 2)
            ->whereHas('products', function ($query) use ($category) {
                $query->where('category_id', $category->id)
                    ->where('is_active', true);
            })
            ->with(['products' => function ($query) use ($category) {
                $query->where('category_id', $category->id)
                    ->where('is_active', true)
                    ->with('category');
            }])
            ->withCount(['products' => function ($query) use ($category) {
                $query->where('category_id', $category->id)
                    ->where('is_active', true);
            }])
            ->paginate(8);

        // Get all products in this category (for filters)
        $allProductsQuery = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->with(['category', 'seller']);

        // Apply filters
        if ($request->has('min_price')) {
            $allProductsQuery->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $allProductsQuery->where('price', '<=', $request->max_price);
        }
        if ($request->has('seller')) {
            $allProductsQuery->where('seller_id', $request->seller);
        }

        // Get price range for filter
        $minPrice = Product::where('category_id', $category->id)->min('price');
        $maxPrice = Product::where('category_id', $category->id)->max('price');

        // Get all sellers in this category for filter
        $allSellers = User::where('role_id', 2)
            ->whereHas('products', function ($query) use ($category) {
                $query->where('category_id', $category->id)
                    ->where('is_active', true);
            })
            ->get();

        return view('frontend.categories.show', compact(
            'category',
            'sellers',
            'minPrice',
            'maxPrice',
            'allSellers'
        ));
    }
}
