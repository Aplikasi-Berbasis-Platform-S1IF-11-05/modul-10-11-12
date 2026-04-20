<?php

use App\Http\Controllers\LandingPageController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/products/create', [LandingPageController::class, 'create'])->name('products.create');
Route::post('/products', [LandingPageController::class, 'store'])->name('products.store');
