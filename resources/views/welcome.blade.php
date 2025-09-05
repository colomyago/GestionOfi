<!DOCTYPE html>
<html>
<head>
    <title>Sistema de gestión de equipamiento de oficina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mb-4"> Sistema de gestión de equipamiento de oficina</h1>
                
                <div class="d-grid gap-3">
                    <a href="{{ route('equipment.index') }}" class="btn btn-primary btn-lg">
                        Administrar equipamiento
                    </a>
                    
                    <a href="{{ route('users.index') }}" class="btn btn-success btn-lg">
                        Administrar usuarios
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
