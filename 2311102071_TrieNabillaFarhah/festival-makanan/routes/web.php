<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', [ProductController::class, 'index']);
Route::resource('products', ProductController::class);
Route::get('/menu', function () {
    $products = Product::all();
    return view('products.menu', compact('products'));
});