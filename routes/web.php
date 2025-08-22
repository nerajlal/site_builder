<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LuxuryController1;
use App\Http\Controllers\LuxuryController2;
use App\Http\Controllers\LuxuryController3;
use App\Http\Controllers\LuxuryController4;
use App\Http\Controllers\ProductController1;
use App\Http\Controllers\ProductController2;
use App\Http\Controllers\ProductController3;
use App\Http\Controllers\ProductController4;
use App\Http\Controllers\TemplateSelectionController;
use App\Http\Controllers\TemplateViewController;
use App\Http\Controllers\Customer\SiteCustomerAuthController;
use App\Http\Controllers\Customer\SiteCustomerProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UnifiedProductController;
use App\Http\Controllers\WebsiteViewController;

// Public routes
Route::get('/', fn() => view('index'));
Route::get('/register', fn() => view('register'));

// Route to handle storage files
Route::get('/storage/{path}', [ImageController::class, 'show'])->where('path', '.*');

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Session::flush();
    return redirect('/');
});

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/stats/{website_id}', [DashboardController::class, 'getWebsiteStats']);
Route::get('/dashboard/export/{website_id}', [DashboardController::class, 'exportOrders']);
Route::get('/notifications/new-order-count', [DashboardController::class, 'getNewOrderCount']);
Route::get('/notifications/new-orders', [DashboardController::class, 'getNewOrders']);

// Profile routes
Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Template view routes
Route::get('/template', [TemplateController::class, 'showSitesForTemplateSelection']);
Route::get('/template/select/{website_id}', [TemplateController::class, 'showTemplateSelectionForSite']);
Route::get('/preview/{templateId}', [TemplateController::class, 'preview'])->name('template.preview');
Route::post('/select-template', [TemplateSelectionController::class, 'store'])->name('template.select');

Route::get('/template-view/{headerFooterId}', [TemplateViewController::class, 'show']);
Route::get('/view/{headerFooterId}', [WebsiteViewController::class, 'show']);

// Template data routes
Route::get('/data', [TemplateController::class, 'show'])->name('d.storedata');

Route::get('/add', [TemplateController::class, 'showSites']);
Route::get('/addproducts/{id}', [TemplateController::class, 'showAddProducts']);
Route::post('/add-brand/{siteId}', [TemplateController::class, 'storeBrand'])->name('storeBrand');
Route::post('/add-product/{siteId}', [TemplateController::class, 'storeProduct'])->name('storeProduct');
Route::delete('/delete-brand/{id}', [TemplateController::class, 'deleteBrand'])->name('deleteBrand');
Route::delete('/delete-product/{id}', [TemplateController::class, 'deleteProduct'])->name('deleteProduct');
Route::put('/products/update/{id}', [TemplateController::class, 'updateProduct'])->name('updateProduct');

// Template display routes (Luxury)
Route::get('/index/{headerFooterId}', [WebsiteViewController::class, 'index'])->name('index.customer');



// Customer-facing product routes with header_footer_id
Route::get('/products/{headerFooterId}', [UnifiedProductController::class, 'show'])->name('products.show');
Route::get('/single-product/{headerFooterId}/{productId}', [UnifiedProductController::class, 'showSingleProduct'])->name('single-product.customer');


// Site customer auth endpoints (AJAX)
Route::get('/customer/check-auth', [SiteCustomerAuthController::class, 'checkAuth']);
Route::post('/customer/login', [SiteCustomerAuthController::class, 'login']);
Route::post('/customer/send-otp', [SiteCustomerAuthController::class, 'sendOtp']);
Route::post('/customer/verify-otp', [SiteCustomerAuthController::class, 'verifyOtp']);
Route::post('/customer/set-credentials', [SiteCustomerAuthController::class, 'setCredentials']);
Route::post('/customer/sign-out', [SiteCustomerAuthController::class, 'signOut']);

// Site customer profile endpoints (AJAX)
Route::get('/customer/profile', [SiteCustomerProfileController::class, 'show']);
Route::post('/customer/profile/update', [SiteCustomerProfileController::class, 'update']);

// Cart routes
Route::post('/cart/add/{headerFooterId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/count/{headerFooterId}', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/cart/{headerFooterId}', [CartController::class, 'getCartItems'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Order routes
Route::post('/order/place/{headerFooterId}', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/orders/{headerFooterId}', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/{order_id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/orders/{order_id}/details', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{order_id}/invoice', [OrderController::class, 'showInvoice'])->name('orders.invoice');

// Wishlist routes
Route::get('/wishlist/{headerFooterId}', [WishlistController::class, 'getWishlistItems'])->name('wishlist.view');
Route::post('/wishlist/add/{headerFooterId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove/{headerFooterId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/wishlist/count/{headerFooterId}', [WishlistController::class, 'getWishlistCount'])->name('wishlist.count');

// Review route
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// Template save route
Route::post('/template1/save', [TemplateController::class, 'store'])->name('template1.save');
