<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        $products = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->take(10)
            ->get();

        // Get sellers with their products
        $sellers = User::where('role_id', 2)
            ->where('is_active', true)
            ->withCount('products')
            ->take(6)
            ->get()
            ->map(function ($seller) {
                // Get 5 products for each seller
                $seller->featured_products = Product::where('seller_id', $seller->id)
                    ->where('is_active', true)
                    ->with('category')
                    ->take(5)
                    ->get();
                return $seller;
            });

        // For the main featured seller slider
        $featuredSeller = $sellers->first();
        $featuredSellerProducts = $featuredSeller->featured_products ?? collect();

        return view('frontend.home', compact(
            'categories',
            'products',
            'sellers',
            'featuredSeller',
            'featuredSellerProducts'
        ));
    }
}
