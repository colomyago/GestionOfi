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
    ], [
        'name.required' => 'El campo nombre es obligatorio',
        'name.string' => 'El nombre debe ser texto',
        'name.max' => 'El nombre no puede tener más de 255 caracteres',
        'email.required' => 'El campo email es obligatorio',
        'email.email' => 'El email debe ser una dirección válida',
        'email.unique' => 'Este email ya está registrado',
        'password.required' => 'La contraseña es obligatoria',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres'
    ]);

    $validated['password'] = bcrypt($validated['password']);
    User::create($validated);

    return redirect()->route('users.index')
        ->with('success', 'Usuario creado exitosamente.');
})->name('users.store');

Route::get('/geminiTest', function () {
    return view('geminiTest');
});

