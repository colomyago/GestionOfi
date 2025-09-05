<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController; // Add this line
use App\Models\User;
use App\Models\Equipment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/geminiTest', function () {
    return view('geminiTest');
});

Route::get('/usuarios', function () {
    return User::all();
});

Route::get('/equipos', function () {
    return Equipment::all();
});

Route::get('/gemini', [GeminiController::class, 'index']);
Route::post('/gemini', [GeminiController::class, 'chat']);