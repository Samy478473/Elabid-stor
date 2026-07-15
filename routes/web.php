<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Store
|--------------------------------------------------------------------------
*/

Route::get('/', [StoreController::class, 'home'])->name('store.home');

Route::get('/products/{category?}', [StoreController::class, 'products'])
    ->name('store.products');

Route::get('/product/{product}', [StoreController::class, 'show'])
    ->name('products.show');

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::get('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');
Route::get('/cart/update/{id}', [CartController::class, 'update'])    ->name('cart.update');

/*
|--------------------------------------------------------------------------
| Dashboard + Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/checkout', [OrderController::class, 'checkout'])
        ->name('checkout');

    Route::post('/checkout', [OrderController::class, 'store'])
        ->name('order.store');

    Route::get('/order/success', [OrderController::class, 'success'])
        ->name('order.success');

    Route::get('/admin', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Products
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders.index');

    Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::put('/admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');

    Route::get('/admin/customers', [CustomerController::class, 'index'])
        ->name('admin.customers.index');

    Route::get('/admin/products', [ProductController::class, 'index'])
        ->name('admin.products.index');

    Route::get('/admin/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/admin/products', [ProductController::class, 'store'])
        ->name('admin.products.store');

    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('admin.products.edit');

    Route::put('/admin/products/{product}', [ProductController::class, 'update'])
        ->name('admin.products.update');

    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])
        ->name('admin.products.destroy');

});

require __DIR__.'/auth.php';
use App\Http\Controllers\Admin\CategoryController;

Route::middleware('auth')->group(function () {

    Route::get('/admin/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/admin/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/admin/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

});
