<!DOCTYPE html>
<html>
<head>
    <title>Lista de Equipamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Lista de Equipamiento</h2>
                <a href="{{ route('equipment.create') }}" class="btn btn-light">Agregar Nuevo Equipo</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Usuario Asignado</th>
                            <th>Estado</th> {{-- Nueva columna --}}
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipment as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->user ? $item->user->name : 'No asignado' }}</td>
                                <td>{{ ucfirst($item->status) }}</td> {{-- Mostrar estado --}}
                                <td>
                                    <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('equipment.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este equipo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
