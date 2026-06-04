<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin.redirect'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
Route::get('/category/{id}/products', [HomeController::class, 'categoryProducts'])->name('category.products');
Route::post('/cart/add/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [App\Http\Controllers\Frontend\OrderController::class, 'index'])->name('cart.index');

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('backend.admin');

    // Category Resource Routes (Create, View, Edit, Delete)
    Route::resource('admin/categories', CategoryController::class)->names('admin.categories');

    // Product Resource Routes
    Route::resource('admin/products', ProductController::class)->names('admin.products');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
