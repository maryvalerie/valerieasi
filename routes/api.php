<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::post('/orders', [CarController::class, 'storeOrder']);
