<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Sistema de Gestión de Oficina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-dark text-white py-4 min-vh-100">
                <h4 class="text-center mb-4">Gestión de Oficina</h4>
                <div class="nav flex-column">
                    <a href="{{ url('/') }}" class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}">
                        Inicio
                    </a>
                    <a href="{{ route('equipment.index') }}" class="nav-link text-white {{ request()->is('equipment*') ? 'active' : '' }}">
                        Equipamiento
                    </a>
                    <a href="{{ route('users.index') }}" class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }}">
                        Usuarios
                    </a>
                    <a href="{{ route('gemini.index') }}" class="nav-link text-white {{ request()->is('gemini*') ? 'active' : '' }}">
                        Gemini
                    </a>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-10">
                <div class="container py-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>