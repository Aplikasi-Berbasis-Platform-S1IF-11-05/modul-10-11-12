<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard
Route::get('/dashboard', [ProductController::class, 'dashboard']);

// CRUD Produk
Route::resource('products', ProductController::class);