<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // For demo purposes
        $cartItems = collect([
            (object)[
                'product' => (object)[
                    'name' => 'Organic Apples',
                    'image' => 'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'price' => 4.99,
                ],
                'quantity' => 2,
                'total_price' => 9.98,
            ],
            (object)[
                'product' => (object)[
                    'name' => 'Fresh Carrots',
                    'image' => 'https://images.unsplash.com/photo-1522184216316-3c25379f9760?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'price' => 3.49,
                ],
                'quantity' => 1,
                'total_price' => 3.49,
            ],
        ]);

        $subtotal = $cartItems->sum('total_price');
        $shipping = $subtotal > 50 ? 0 : 5.99;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        return view('frontend.checkout.index', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function process(Request $request)
    {
        // This would process the order in a real application
        $paymentMethod = $request->payment_method;

        // For demo, just show success page
        return view('frontend.checkout.success');
    }
}
