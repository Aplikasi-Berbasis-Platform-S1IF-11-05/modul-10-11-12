<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::where('is_available', true)->latest()->get();

    return view('welcome', compact('products'));
});

Route::resource('products', ProductController::class)->except(['show']);
