<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::post('/orders', [CarController::class, 'storeOrder'])->name('orders.store');
