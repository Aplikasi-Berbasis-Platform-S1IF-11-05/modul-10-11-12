<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Halaman utama (tampilkan produk)
Route::get('/', [ProductController::class, 'index']);

// Halaman form tambah produk
Route::get('/create', [ProductController::class, 'create']);

// Proses simpan data
Route::post('/store', [ProductController::class, 'store']);

// Hapus produk
Route::get('/delete/{id}', [ProductController::class, 'delete']);