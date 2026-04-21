<?php

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/tambah', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/update/{id}', [ProductController::class, 'update']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
