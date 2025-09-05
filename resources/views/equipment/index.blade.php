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
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Asignado a</th>
                                <th>Fecha Préstamo</th>
                                <th>Fecha Devolución</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipment as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->status === 'Available' ? 'success' : ($item->status === 'In Use' ? 'primary' : 'warning') }}">
                                            @switch($item->status)
                                                @case('Available')
                                                    Disponible
                                                    @break
                                                @case('In Use')
                                                    En Uso
                                                    @break
                                                @case('Maintenance')
                                                    En Mantenimiento
                                                    @break
                                                @default
                                                    {{ $item->status }}
                                            @endswitch
                                        </span>
                                    </td>
                                    <td>{{ $item->user ? $item->user->name : 'Sin asignar' }}</td>
                                    <td>{{ $item->fecha_prestado ? date('d/m/Y', strtotime($item->fecha_prestado)) : 'N/A' }}</td>
                                    <td>{{ $item->fecha_devolucion ? date('d/m/Y', strtotime($item->fecha_devolucion)) : 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('equipment.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este equipo?')">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>