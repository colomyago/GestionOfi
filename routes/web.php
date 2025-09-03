<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Models\User;
use App\Models\Equipment;

Route::get('/usuarios', function () {
    return User::all();
});

Route::get('/equipos', function () {
    return Equipment::all();
});