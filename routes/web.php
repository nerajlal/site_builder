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

// Public routes
Route::get('/', fn() => view('index'));
Route::get('/register', fn() => view('register'));

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Session::flush();
    return redirect('/');
});

// Dashboard route
Route::get('/dashboard', function () {
    if (!session()->has('userid')) {
        return redirect('/login');
    }
    return view('dashboard');
});

// Profile routes
Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Template view routes
Route::get('/template', fn() => view('d_template'));
Route::post('/select-template', [TemplateSelectionController::class, 'store'])->name('template.select');

Route::get('/template-view/{headerFooterId}', [TemplateViewController::class, 'show']);
Route::get('/view/{headerFooterId}', [WebsiteViewController::class, 'show']);

// Template data routes
Route::get('/data', [TemplateController::class, 'show'])->name('d.storedata');

Route::get('/add', [TemplateController::class, 'showSites']);
Route::get('/addproducts/{id}', [TemplateController::class, 'showAddProducts']);
Route::post('/add-brand/{siteId}', [TemplateController::class, 'storeBrand'])->name('storeBrand');
Route::post('/add-category/{siteId}', [TemplateController::class, 'storeCategory'])->name('storeCategory');
Route::post('/add-product/{siteId}', [TemplateController::class, 'storeProduct'])->name('storeProduct');
Route::delete('/delete-brand/{id}', [TemplateController::class, 'deleteBrand'])->name('deleteBrand');
Route::delete('/delete-category/{id}', [TemplateController::class, 'deleteCategory'])->name('deleteCategory');
Route::delete('/delete-product/{id}', [TemplateController::class, 'deleteProduct'])->name('deleteProduct');
Route::put('/products/update/{id}', [TemplateController::class, 'updateProduct'])->name('updateProduct');

// Template display routes (Luxury)
Route::get('/index1', [LuxuryController1::class, 'index'])->name('template1.index1');
Route::get('/index2', [LuxuryController2::class, 'index'])->name('template2.index2');
Route::get('/index3', [LuxuryController3::class, 'index'])->name('template3.index3');
Route::get('/index4', [LuxuryController4::class, 'index'])->name('template4.index4');

Route::get('/product1', [ProductController1::class, 'index'])->name('template1.product1');
Route::get('/product2', [ProductController2::class, 'index'])->name('template2.product2');
Route::get('/product3', [ProductController3::class, 'index'])->name('template3.product3');
Route::get('/product4', [ProductController4::class, 'index'])->name('template4.product4');

// Template save route
Route::post('/template1/save', [TemplateController::class, 'store'])->name('template1.save');
