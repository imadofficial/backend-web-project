<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\plancontroller;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
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