<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\plancontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroController;

Route::get('/', function () {
    $hero = \App\Models\Hero::latest()->first();
    return view('welcome', compact('hero'));
});

Route::get('/plans', function () {
    return view('plans');
});

Route::get('/countries', [plancontroller::class, 'showCountries']);

Route::get('/plans', [plancontroller::class, 'getPlans']);

// Authenticatie routes (die je de gebruiker effectief ziet)
Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/login', [AuthController::class, 'showLogin']);

// Achtergrond routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin/modifyHero', [HeroController::class, 'index']);
    Route::post('/admin/hero', [HeroController::class, 'store']);
});