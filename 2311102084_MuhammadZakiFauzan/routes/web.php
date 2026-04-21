<?php
use App\Http\Controllers\FestivalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FestivalController::class, 'index']);
Route::get('/tambah', [FestivalController::class, 'create']);
Route::post('/simpan', [FestivalController::class, 'store']);
Route::get('/edit/{id}', [FestivalController::class, 'edit']);
Route::put('/update/{id}', [FestivalController::class, 'update']);
Route::delete('/hapus/{id}', [FestivalController::class, 'destroy']);
