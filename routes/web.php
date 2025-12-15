<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

// Admin Controllers
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Seller\OrderController as SellerOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Seller Controllers
use App\Http\Controllers\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

// Customer Controllers
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Customer\CheckoutController as CustomerCheckoutController;
use App\Http\Controllers\Admin\AnalyticsController as AdminAnalyticsController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Seller\AnalyticsController as SellerAnalyticsController;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Customer\WishlistController as CustomerWishlistController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
// Route::get('/', function () {
//     return redirect()->route('dashboard');
// })->name('home');

Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

// About Us
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Contact Us
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');

// Terms and Privacy
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

// Product Listing (Public)
Route::get('/products', [CustomerProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [CustomerProductController::class, 'show'])->name('products.show');
// Category Routes
Route::get('/categories', [CustomerCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CustomerCategoryController::class, 'show'])->name('categories.show');
Route::get('/cart', [CustomerCartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CustomerCheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CustomerCheckoutController::class, 'process'])->name('checkout.process');
/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Password Reset
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Email Verification
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [AuthController::class, 'showVerifyEmail'])->name('verification.notice');
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Main Dashboard Redirect
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Users Management
        Route::resource('users', AdminUserController::class);
        Route::post('/users/{user}/activate', [AdminUserController::class, 'activate'])->name('users.activate');
        Route::post('/users/{user}/deactivate', [AdminUserController::class, 'deactivate'])->name('users.deactivate');

        // Products Management
        Route::resource('products', AdminProductController::class);
        Route::post('/products/{product}/approve', [AdminProductController::class, 'approve'])->name('products.approve');
        Route::post('/products/{product}/reject', [AdminProductController::class, 'reject'])->name('products.reject');

        // Orders Management
        Route::resource('orders', AdminOrderController::class);
        Route::post('/orders/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::get('/orders/{order}/invoice', [AdminOrderController::class, 'invoice'])->name('orders.invoice');

        // Categories Management
        Route::resource('categories', AdminCategoryController::class);
        Route::get('/categories/{category}/products', [AdminCategoryController::class, 'products'])->name('categories.products');

        // Analytics & Reports
        Route::prefix('analytics')->name('analytics.')->group(function () {
            Route::get('/sales', [AdminAnalyticsController::class, 'sales'])->name('sales');
            Route::get('/users', [AdminAnalyticsController::class, 'users'])->name('users');
            Route::get('/products', [AdminAnalyticsController::class, 'products'])->name('products');
            Route::get('/export/{type}', [AdminAnalyticsController::class, 'export'])->name('export');
        });

        // Settings
        Route::get('/settings', [SettingsController::class, 'admin'])->name('settings');
        Route::put('/settings/general', [SettingsController::class, 'updateGeneral'])->name('settings.general.update');
        Route::put('/settings/payment', [SettingsController::class, 'updatePayment'])->name('settings.payment.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Seller Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:seller'])->prefix('seller')->name('seller.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');

        // Products Management
        Route::resource('products', SellerProductController::class);
        Route::post('/products/{product}/update-stock', [SellerProductController::class, 'updateStock'])->name('products.update-stock');
        Route::post('/products/{product}/toggle-status', [SellerProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::post('/products/{product}/upload-images', [SellerProductController::class, 'uploadImages'])->name('products.upload-images');
        Route::delete('/products/{product}/images/{image}', [SellerProductController::class, 'deleteImage'])->name('products.images.delete');

        // Orders Management
        Route::resource('orders', SellerOrderController::class);
        Route::get('/orders/{order}/details', [SellerOrderController::class, 'details'])->name('orders.details');
        Route::post('/orders/{order}/update-status', [SellerOrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::post('/orders/{order}/ship', [SellerOrderController::class, 'ship'])->name('orders.ship');


        // Profile
        Route::get('/profile', [ProfileController::class, 'seller'])->name('profile');
        Route::put('/profile/business', [ProfileController::class, 'updateBusiness'])->name('profile.business.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Customer Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:customer'])->prefix('customer')->name('customer.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

        // Products
        Route::get('/products', [CustomerProductController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [CustomerProductController::class, 'show'])->name('products.show');
        Route::get('/products/category/{category}', [CustomerProductController::class, 'byCategory'])->name('products.category');
        Route::get('/products/search', [CustomerProductController::class, 'search'])->name('products.search');

        // Cart
        Route::resource('cart', CustomerCartController::class);
        Route::post('/cart/add/{product}', [CustomerCartController::class, 'add'])->name('cart.add');
        Route::post('/cart/update/{cartItem}', [CustomerCartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove/{cartItem}', [CustomerCartController::class, 'remove'])->name('cart.remove');
        Route::post('/cart/clear', [CustomerCartController::class, 'clear'])->name('cart.clear');

        // Checkout
        Route::get('/checkout', [CustomerCartController::class, 'checkout'])->name('checkout');
        Route::post('/checkout/process', [CustomerCartController::class, 'processCheckout'])->name('checkout.process');
        Route::get('/checkout/success/{order}', [CustomerCartController::class, 'success'])->name('checkout.success');
        Route::get('/checkout/cancel', [CustomerCartController::class, 'cancel'])->name('checkout.cancel');

        // Orders
        Route::resource('orders', CustomerOrderController::class);
        Route::get('/orders/{order}/track', [CustomerOrderController::class, 'track'])->name('orders.track');
        Route::post('/orders/{order}/cancel', [CustomerOrderController::class, 'cancel'])->name('orders.cancel');
        Route::post('/orders/{order}/review', [CustomerOrderController::class, 'review'])->name('orders.review');
        Route::get('/orders/{order}/invoice', [CustomerOrderController::class, 'invoice'])->name('orders.invoice');

        // Address Book
        Route::get('/addresses', [ProfileController::class, 'addresses'])->name('addresses');
        Route::post('/addresses', [ProfileController::class, 'addAddress'])->name('addresses.add');
        Route::put('/addresses/{address}', [ProfileController::class, 'updateAddress'])->name('addresses.update');
        Route::delete('/addresses/{address}', [ProfileController::class, 'deleteAddress'])->name('addresses.delete');
        Route::post('/addresses/{address}/set-default', [ProfileController::class, 'setDefaultAddress'])->name('addresses.set-default');
    });

    /*
    |--------------------------------------------------------------------------
    | Common Routes (All Roles)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth'])->group(function () {
        // Notifications
        Route::get('/notifications', function () {
            return view('notifications.index');
        })->name('notifications.index');

        Route::get('/notifications/{notification}', function ($notification) {
            // Mark as read and show notification
            auth()->user()->notifications()->where('id', $notification)->first()->markAsRead();
            return back();
        })->name('notifications.show');

        Route::post('/notifications/mark-all-read', function () {
            auth()->user()->unreadNotifications->markAsRead();
            return back()->with('success', 'All notifications marked as read.');
        })->name('notifications.mark-all-read');

        // Messages
        Route::get('/messages', function () {
            return view('messages.index');
        })->name('messages.index');

        Route::get('/messages/{user}', function ($user) {
            return view('messages.conversation', compact('user'));
        })->name('messages.conversation');

        Route::post('/messages/{user}', function ($user) {
            // Send message logic
            return back()->with('success', 'Message sent.');
        })->name('messages.send');

        // Help & Support
        Route::get('/help', function () {
            return view('help.index');
        })->name('help.index');

        Route::get('/help/faq', function () {
            return view('help.faq');
        })->name('help.faq');

        Route::get('/help/tutorials', function () {
            return view('help.tutorials');
        })->name('help.tutorials');
    });
});

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

/*
|--------------------------------------------------------------------------
| API Documentation (if needed)
|--------------------------------------------------------------------------
*/
Route::get('/api/documentation', function () {
    return view('api.documentation');
})->name('api.documentation');

/*
|--------------------------------------------------------------------------
| Payment Gateway Callbacks (Webhooks)
|--------------------------------------------------------------------------
*/
Route::prefix('webhooks')->name('webhooks.')->group(function () {
    Route::post('/payment/success', function () {
        // Handle payment success webhook
    })->name('payment.success');

    Route::post('/payment/failed', function () {
        // Handle payment failed webhook
    })->name('payment.failed');

    Route::post('/payment/refund', function () {
        // Handle payment refund webhook
    })->name('payment.refund');
});


require __DIR__ . '/auth.php';
