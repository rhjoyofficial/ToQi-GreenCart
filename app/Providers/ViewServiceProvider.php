<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Footer;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FooterController;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /** * Register services. */
    public function register(): void
    {
        //
    }
    /** * Bootstrap services. */
    public function boot()
    {
        // Global Navigation using real Category data 
        View::composer('*', function ($view) {
            $categories = Category::withCount('products')->get();

            $view->with('navCategories', $categories);
        });
    }
}
