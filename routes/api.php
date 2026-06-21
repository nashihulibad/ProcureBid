<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\AuthController as V1AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'API is healthy',
        'data' => [
            'status' => 'ok',
            'service' => 'laravel-api',
            'timestamp' => now()->toIso8601String(),
        ],
    ]);
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:register');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [V1AuthController::class, 'register'])->middleware('throttle:register');
    Route::post('/login', [V1AuthController::class, 'login'])->middleware('throttle:login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [V1AuthController::class, 'me'])->middleware('abilities:profile:read');
        Route::post('/logout', [V1AuthController::class, 'logout']);
    });
});
