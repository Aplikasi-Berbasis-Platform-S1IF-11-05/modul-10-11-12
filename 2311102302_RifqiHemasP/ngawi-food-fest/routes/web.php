<?php

use App\Http\Controllers\FrontPageController;

Route::get('/', [FrontPageController::class, 'index']);