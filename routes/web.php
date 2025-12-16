<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

// Auth & Core
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

// Frontend
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CheckoutController as FrontendCheckoutController;

// Admin
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AnalyticsController as AdminAnalyticsController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\SellerController as AdminSellerController;
use App\Http\Controllers\Admin\ReportsController as AdminReportsController;

// Seller
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Seller\OrderController as SellerOrderController;
use App\Http\Controllers\Seller\AnalyticsController as SellerAnalyticsController;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;

// Customer
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Customer\CheckoutController as CustomerCheckoutController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\WishlistController as CustomerWishlistController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/shipping-policy', [HomeController::class, 'shippingPolicy'])->name('shipping.policy');
Route::get('/return-policy', [HomeController::class, 'returnPolicy'])->name('return.policy');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy.policy');

// Public Product & Category Browsing
Route::get('/products', [CustomerProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [CustomerProductController::class, 'show'])->name('products.show');

Route::get('/categories', [CustomerCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CustomerCategoryController::class, 'show'])->name('categories.show');

// Cart & Checkout (Guest view)
Route::get('/cart', [CustomerCartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CustomerCheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CustomerCheckoutController::class, 'process'])->name('checkout.process');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Guest)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Email Verification
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [AuthController::class, 'showVerifyEmail'])->name('verification.notice');
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (All Users)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/notifications', [AdminDashboardController::class, 'notifications'])->name('notifications');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/activity', [ProfileController::class, 'activity'])->name('activity');

        Route::resource('users', AdminUserController::class);
        Route::post('users/{user}/activate', [AdminUserController::class, 'activate'])->name('users.activate');
        Route::post('users/{user}/deactivate', [AdminUserController::class, 'deactivate'])->name('users.deactivate');
        // Sellers
        Route::get('/sellers', [AdminSellerController::class, 'index'])->name('sellers.index');
        Route::get('/sellers/{seller}', [AdminSellerController::class, 'show'])->name('sellers.show');

        Route::resource('products', AdminProductController::class);
        Route::post('products/{product}/approve', [AdminProductController::class, 'approve'])->name('products.approve');
        Route::post('products/{product}/reject', [AdminProductController::class, 'reject'])->name('products.reject');

        Route::resource('orders', AdminOrderController::class);
        Route::post('orders/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::get('orders/{order}/invoice', [AdminOrderController::class, 'invoice'])->name('orders.invoice');

        Route::resource('categories', AdminCategoryController::class);
        Route::get('categories/{category}/products', [AdminCategoryController::class, 'products'])->name('categories.products');
        Route::get('/settings', [AdminSettingsController::class, 'settings'])->name('settings.general');
        Route::get('/reports', [AdminReportsController::class, 'index'])->name('reports.index');

        Route::prefix('analytics')->name('analytics.')->group(function () {
            Route::get('sales', [AdminAnalyticsController::class, 'sales'])->name('sales');
            Route::get('users', [AdminAnalyticsController::class, 'users'])->name('users');
            Route::get('products', [AdminAnalyticsController::class, 'products'])->name('products');
            Route::get('export/{type}', [AdminAnalyticsController::class, 'export'])->name('export');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Seller Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function () {

        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/analytics-sales', [SellerDashboardController::class, 'analyticsSales'])->name('analytics.sales');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/settings', [SellerDashboardController::class, 'settings'])->name('settings');

        Route::resource('products', SellerProductController::class);
        Route::resource('orders', SellerOrderController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | Customer Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {

        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

        Route::resource('cart', CustomerCartController::class);
        Route::resource('orders', CustomerOrderController::class);
    });
});

/*
|--------------------------------------------------------------------------
| System & Utility Routes
|--------------------------------------------------------------------------
*/

Route::fallback(fn() => response()->view('errors.404', [], 404));

Route::get('/api/documentation', fn() => view('api.documentation'))
    ->name('api.documentation');

Route::prefix('webhooks')->name('webhooks.')->group(function () {
    Route::post('/payment/success')->name('payment.success');
    Route::post('/payment/failed')->name('payment.failed');
    Route::post('/payment/refund')->name('payment.refund');
});

require __DIR__ . '/auth.php';
