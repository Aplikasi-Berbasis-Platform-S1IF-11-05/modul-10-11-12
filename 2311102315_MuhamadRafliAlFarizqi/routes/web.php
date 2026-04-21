<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');
Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');
