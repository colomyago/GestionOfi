<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;

// Controlador CRUD para gestionar Equipos y asignarlos a usuarios
class EquipmentController extends Controller
{
    /**
     * Mostrar listado de equipos
     */
    public function index()
    {
        $equipment = Equipment::with('user')->get(); // Incluye usuario asignado
        return view('equipment.index', compact('equipment'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $users = User::all(); // Listar usuarios para asignar
        return view('equipment.create', compact('users'));
    }

    /**
     * Guardar un nuevo equipo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|string|in:active,inactive', // 👈 Validación de estado
        ]);

        Equipment::create($validated);

        return redirect()->route('equipment.index')
                         ->with('success', 'Equipo creado correctamente');
    }

    /**
     * Mostrar detalle de un equipo
     */
    public function show(Equipment $equipment)
    {
        $equipment->load('user');
        return view('equipment.show', compact('equipment'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Equipment $equipment)
    {
        $users = User::all();
        return view('equipment.edit', compact('equipment', 'users'));
    }

    /**
     * Actualizar equipo existente
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|string|in:active,inactive', // 👈 Validación de estado
        ]);

        $equipment->update($validated);

        return redirect()->route('equipment.index')
                         ->with('success', 'Equipo actualizado correctamente');
    }

    /**
     * Eliminar equipo
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipment.index')
                         ->with('success', 'Equipo eliminado correctamente');
    }
}
