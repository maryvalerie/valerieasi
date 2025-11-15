<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/cars');
});

Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::post('/orders', [CarController::class, 'storeOrder'])->name('orders.store');


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\PermitController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Document Requests
    Route::prefix('documents')->group(function () {
        Route::get('/', [DocumentRequestController::class, 'index'])->name('documents.index');
        Route::get('/create', [DocumentRequestController::class, 'create'])->name('documents.create');
        Route::post('/', [DocumentRequestController::class, 'store'])->name('documents.store');
        Route::get('/{documentRequest}', [DocumentRequestController::class, 'show'])->name('documents.show');
    });
    
    // Permits
    Route::prefix('permits')->group(function () {
        Route::get('/', [PermitController::class, 'index'])->name('permits.index');
        Route::get('/create', [PermitController::class, 'create'])->name('permits.create');
        Route::post('/', [PermitController::class, 'store'])->name('permits.store');
        Route::get('/{permit}', [PermitController::class, 'show'])->name('permits.show');
    });
});