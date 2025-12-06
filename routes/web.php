<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return view('welcome');
});

// Source: https://laravel.com/docs/12.x/routing#route-group-prefixes
// Dit is een route lijst voor de API Endpoints.
Route::prefix('api')->group(function () {
    Route::get('/health', [ApiController::class, 'healthCheck']);
    Route::get('/users', [ApiController::class, 'getUsers']);
    Route::get('/users/{id}', [ApiController::class, 'getUser']);
});
