<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products = Product::latest()->get();
    return view('home', compact('products'));
})->name('home');

Route::resource('products', ProductController::class);