<?php
// Buswiryawan Raditya Boenyamin
// 2311102090

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::get('/', [ProductController::class, 'index'])->name('home');