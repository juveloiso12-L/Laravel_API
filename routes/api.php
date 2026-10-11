<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthController;

// 1. Route Public untuk Login (Tambahkan baris ini)
Route::post('/login', [AuthController::class, 'login']);

// 2. Route yang dilindungi Middleware Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('books', BookController::class);
});