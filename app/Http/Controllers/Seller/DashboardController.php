<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $seller = Auth::user();

        // Get recent orders for the seller
        $recentOrders = OrderItem::where('seller_id', $seller->id)
            ->with('order')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get low stock products
        $lowStockProducts = Product::where('seller_id', $seller->id)
            ->where('stock_quantity', '<=', 10)
            ->where('stock_quantity', '>', 0)
            ->orderBy('stock_quantity', 'asc')
            ->take(5)
            ->get();

        return view('seller.dashboard', compact('recentOrders', 'lowStockProducts'));
    }
}
