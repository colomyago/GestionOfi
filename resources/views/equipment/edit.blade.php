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
                        <input type="text" class="form-control" id="name" name="name" value="{{ $equipment->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description">{{ $equipment->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Usuario</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option value="">-- Seleccionar usuario --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $equipment->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Campo STATUS con valor actual --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active" {{ $equipment->status == 'active' ? 'selected' : '' }}>Activo</option>
                            <option value="inactive" {{ $equipment->status == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
