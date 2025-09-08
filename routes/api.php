<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;

// Test route to verify API is working
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::get('/gemini', [GeminiController::class, 'index']);
Route::post('/gemini', [GeminiController::class, 'chat']);