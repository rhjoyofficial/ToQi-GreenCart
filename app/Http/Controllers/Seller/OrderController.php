<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = OrderItem::where('seller_id', Auth::id())
            ->with(['order.customer', 'product'])
            ->latest()
            ->paginate(15);

        return view('seller.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Get only order items that belong to this seller
        $orderItems = $order->items()->where('seller_id', Auth::id())->get();

        if ($orderItems->isEmpty()) {
            abort(404);
        }

        return view('seller.orders.show', compact('order', 'orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        // Check if seller has items in this order
        $hasItems = $order->items()->where('seller_id', Auth::id())->exists();

        if (!$hasItems) {
            return response()->json(['success' => false, 'message' => 'Access denied'], 403);
        }

        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => true]);
    }
}
