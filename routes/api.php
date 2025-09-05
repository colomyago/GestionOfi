<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;
Route::get('/hola', function () {
    return ['message' => 'Hello, World!'];
});
