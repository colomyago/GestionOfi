<!DOCTYPE html>
<html>
<head>
    <title>Editar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Editar Equipo</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $equipment->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', $equipment->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Available" {{ $equipment->status === 'Available' ? 'selected' : '' }}>Disponible</option>
                            <option value="In Use" {{ $equipment->status === 'In Use' ? 'selected' : '' }}>En Uso</option>
                            <option value="Maintenance" {{ $equipment->status === 'Maintenance' ? 'selected' : '' }}>En Mantenimiento</option>
                            <option value="Out of Service" {{ $equipment->status === 'Out of Service' ? 'selected' : '' }}>Fuera de Servicio</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Asignar a Usuario</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option value="">Seleccionar Usuario</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $equipment->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_prestado" class="form-label">Fecha y Hora de Préstamo</label>
                        <input type="datetime-local" class="form-control" id="fecha_prestado" name="fecha_prestado" 
                               value="{{ old('fecha_prestado', $equipment->fecha_prestado ? date('Y-m-d\TH:i', strtotime($equipment->fecha_prestado)) : '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_devolucion" class="form-label">Fecha y Hora de Devolución</label>
                        <input type="datetime-local" class="form-control" id="fecha_devolucion" name="fecha_devolucion" 
                               value="{{ old('fecha_devolucion', $equipment->fecha_devolucion ? date('Y-m-d\TH:i', strtotime($equipment->fecha_devolucion)) : '') }}">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar Equipo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>