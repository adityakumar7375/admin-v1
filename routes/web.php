<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Route::post('/save-location', [LoginController::class, 'saveLocation']);
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/setSession/{any}', [LoginController::class, 'setSession'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('request-logout', [LoginController::class, 'request_logout'])->name('request-logout');
// Route::post('submit-otp', [LoginController::class, 'submit_otp'])->name('submit.otp');


Route::middleware('check.session')->group(function () {
    
    Route::get('/dashboard-data', [DashboardController::class, 'dashboard_data'])->name('dashboard.data');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    
});