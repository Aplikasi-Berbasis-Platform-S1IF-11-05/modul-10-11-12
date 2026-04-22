<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/',                     [ProdukController::class, 'index']);
Route::get('/tambah',               [ProdukController::class, 'create']);
Route::post('/produk',              [ProdukController::class, 'store']);
Route::get('/produk/{id}/edit',     [ProdukController::class, 'edit']);
Route::put('/produk/{id}',          [ProdukController::class, 'update']);
Route::delete('/produk/{id}',       [ProdukController::class, 'destroy']);
Route::get('/produk/gambar/{id}',   [ProdukController::class, 'showGambar'])->name('produk.gambar');