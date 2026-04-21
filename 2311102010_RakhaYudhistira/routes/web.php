<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\AdminController;

Route::get('/', [FestivalController::class, 'index']);
Route::resource('admin', AdminController::class);      