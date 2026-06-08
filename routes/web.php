<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- Frontend Public Routes ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}/products', [HomeController::class, 'categoryProducts'])->name('category.products');
Route::post('/cart/add/{id}', [FrontendOrderController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/count', function() { return response()->json(['count' => count(session('cart', []))]);})->name('cart.count');
Route::delete('/cart/remove/{id}', [FrontendOrderController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [FrontendOrderController::class, 'index'])->name('cart.index');

// --- Authenticated User Routes (Customers) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [FrontendOrderController::class, 'checkout'])->name('checkout');
    Route::post('/order/place', [FrontendOrderController::class, 'placeOrder'])->name('order.place');
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'permission:access admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);
   
    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    // Orders Management
    Route::get('orders', [BackendOrderController::class, 'adminIndex'])->name('orders.index');
    Route::post('orders/accept/{id}', [BackendOrderController::class, 'accept'])->name('orders.accept');
    Route::post('orders/cancel/{id}', [BackendOrderController::class, 'cancel'])->name('orders.cancel');
    Route::delete('orders/destroy/{id}', [BackendOrderController::class, 'destroy'])->name('orders.destroy');
});
require __DIR__.'/auth.php';