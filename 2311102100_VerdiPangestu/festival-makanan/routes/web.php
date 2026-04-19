<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdukController::class, 'home']); // ← ganti ke home

Route::get('/produk',           [ProdukController::class, 'index']);
Route::get('/produk/create',    [ProdukController::class, 'create']);
Route::post('/produk',          [ProdukController::class, 'store']);
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/produk/{id}',      [ProdukController::class, 'update']);
Route::delete('/produk/{id}',   [ProdukController::class, 'destroy']);