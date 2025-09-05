<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\EquipmentController;


Route::get('/', function () {
    return view('welcome');
});

// Equipment Routes
Route::resource('equipment', EquipmentController::class);

// User Routes
Route::get('/users', function () {
    return view('users.index', [
        'users' => User::with('equipment')->get()
    ]);
})->name('users.index');

Route::get('/users/create', function () {
    return view('users.create');
})->name('users.create');

Route::post('/users', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8'
    ]);

    $validated['password'] = bcrypt($validated['password']);
    User::create($validated);

    return redirect()->route('users.index')
        ->with('success', 'Usuario creado exitosamente.');
})->name('users.store');

Route::get('/geminiTest', function () {
    return view('geminiTest');
});

Route::get('/gemini', [GeminiController::class, 'index']);
Route::post('/gemini', [GeminiController::class, 'chat']);