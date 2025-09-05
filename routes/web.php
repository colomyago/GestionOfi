<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\GeminiController;


Route::get('/', function () {
    return view('welcome');
});

// Equipment Routes
Route::get('/equipment', function () {
    return view('equipment.index', [
        'equipment' => Equipment::with('user')->get()
    ]);
})->name('equipment.index');

Route::get('/equipment/create', function () {
    return view('equipment.create', [
        'users' => User::all()
    ]);
})->name('equipment.create');

Route::post('/equipment', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string',
        'user_id' => 'nullable|exists:users,id'
    ]);

    Equipment::create($validated);

    return redirect()->route('equipment.index')
        ->with('success', 'Equipment created successfully');
})->name('equipment.store');

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
        ->with('success', 'User created successfully');
})->name('users.store');

Route::get('/geminiTest', function () {
    return view('geminiTest');
});

Route::get('/gemini', [GeminiController::class, 'index']);
Route::post('/gemini', [GeminiController::class, 'chat']);