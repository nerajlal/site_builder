<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LuxuryController;


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

Route::get('/', function () {
    return view('index');
});
Route::get('/register', function () {
    return view('register');
});

Route::post('/logout', function () {
    Session::flush();
    return redirect('/');
});

Route::get('/dashboard', function () {
    if (!session()->has('userid')) {
        return redirect('/login');
    }
    return view('dashboard');
});
Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');


Route::middleware(['web'])->group(function () {
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('dashboard');
});


Route::get('/index1', function () {
    return view('template1/index1');
});
Route::get('/index2', function () {
    return view('template2/index2');
});
Route::get('/index3', function () {
    return view('template3/index3');
});
Route::get('/index4', function () {
    return view('template4/index4');
});


Route::get('/template', function () {
    return view('d_template');
});
Route::get('/data', function () {
    return view('d_storedata');
});

Route::get('/add', [TemplateController::class, 'showSites']);
Route::get('/addproducts/{id}', [TemplateController::class, 'showAddProducts']);

Route::post('/add-brand/{siteId}', [TemplateController::class, 'storeBrand'])->name('storeBrand');
Route::post('/add-category/{siteId}', [TemplateController::class, 'storeCategory'])->name('storeCategory');
Route::post('/add-product/{siteId}', [TemplateController::class, 'storeProduct'])->name('storeProduct');
Route::delete('/delete-brand/{id}', [TemplateController::class, 'deleteBrand'])->name('deleteBrand');
Route::delete('/delete-category/{id}', [TemplateController::class, 'deleteCategory'])->name('deleteCategory');
Route::delete('/delete-product/{id}', [TemplateController::class, 'deleteProduct'])->name('deleteProduct');
Route::put('/products/update/{id}', [TemplateController::class, 'updateProduct'])->name('updateProduct');

Route::get('/data', [TemplateController::class, 'show'])->name('d.storedata');
Route::get('/index1', [LuxuryController::class, 'index'])->name('template1.index1');

Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/template1/index1', [TemplateController::class, 'show'])->name('template1.index1');
Route::post('/template1/save', [TemplateController::class, 'store'])->name('template1.save');
