<!DOCTYPE html>
<html>
<head>
    <title> Lista de usuarios </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1> Lista de usuarios</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3"> Añadir nuevo usuario </a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Mail</th>
                    <th>Cantidad de equipamiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->equipment->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>