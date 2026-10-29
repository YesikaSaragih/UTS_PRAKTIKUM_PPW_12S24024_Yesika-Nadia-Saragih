<?php

use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TravelController::class, 'index']);
Route::get('/daftar', [TravelController::class, 'daftar']);
