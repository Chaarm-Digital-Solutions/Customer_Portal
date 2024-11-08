<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    
    // Public routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {

        // Create
        Route::post('/users', [UserController::class, 'store']);

        // Read
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);

        // Update
        Route::put('/users/{id}', [UserController::class, 'update']);

        // Delete
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    });
});
