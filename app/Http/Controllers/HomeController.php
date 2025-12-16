<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Existing Methods...
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    public function faqs()
    {
        return view('frontend.pages.faqs');
    }

    public function shippingPolicy()
    {
        return view('frontend.pages.shipping');
    }

    public function returnPolicy()
    {
        return view('frontend.pages.returns');
    }

    public function privacy()
    {
        return view('frontend.pages.privacy');
    }
    public function contactPage()
    {
        return view('frontend.pages.contact');
    }
}
