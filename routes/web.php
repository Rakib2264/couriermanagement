<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPackageController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\TrackController;

Route::get('/', function () {
    return redirect('/login');
})->middleware('auth');

// Auth Routes
Route::middleware('web')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('/packages', AdminPackageController::class);
    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports');
});

// Courier Routes
Route::middleware(['auth'])->prefix('courier')->group(function () {
    Route::get('/dashboard', [CourierController::class, 'index'])->name('courier.dashboard');
    Route::put('/packages/{id}/status', [CourierController::class, 'updateStatus'])->name('courier.packages.status');
});

Route::get('/track', [TrackController::class, 'showTrackForm'])->name('track.form');
Route::post('/track', [TrackController::class, 'track'])->name('track');
