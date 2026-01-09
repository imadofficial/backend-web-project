<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\plancontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/plans', function () {
    return view('plans');
});

Route::get('/countries', [plancontroller::class, 'showCountries']);

Route::get('/plans', [plancontroller::class, 'getPlans']);

// Public FAQ page
Route::get('/faq', [FaqController::class, 'index']);

// Authenticatie routes (die je de gebruiker effectief ziet)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');

// Achtergrond routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// User dashboard (for authenticated non-admin users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard']);
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'adminDashboard']);
    Route::get('/admin/modifyHero', [HeroController::class, 'index']);
    Route::post('/admin/hero', [HeroController::class, 'store']);
    
    // User Management
    Route::get('/admin/users', [UserManagementController::class, 'index']);
    Route::get('/admin/users/create', [UserManagementController::class, 'create']);
    Route::post('/admin/users', [UserManagementController::class, 'store']);
    Route::post('/admin/users/{id}/toggle-admin', [UserManagementController::class, 'toggleAdmin']);
    Route::delete('/admin/users/{id}', [UserManagementController::class, 'destroy']);
    
    // FAQ Management
    Route::get('/admin/faq', [FaqController::class, 'adminIndex']);
    Route::get('/admin/faq/create', [FaqController::class, 'create']);
    Route::post('/admin/faq', [FaqController::class, 'store']);
    Route::get('/admin/faq/{id}/edit', [FaqController::class, 'edit']);
    Route::put('/admin/faq/{id}', [FaqController::class, 'update']);
    Route::delete('/admin/faq/{id}', [FaqController::class, 'destroy']);
});