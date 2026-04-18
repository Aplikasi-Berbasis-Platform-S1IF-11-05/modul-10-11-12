<?php

/**
 * File Rute Web
 * 
 * Di sini adalah tempat di mana Anda dapat mendaftarkan rute web untuk aplikasi Anda.
 * Rute-rute ini dimuat oleh RouteServiceProvider dalam grup yang berisi grup middleware "web".
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('admin/products', ProductController::class);