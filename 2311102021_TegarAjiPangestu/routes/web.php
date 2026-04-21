<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/delete/{id}', [ProductController::class, 'destroy']);