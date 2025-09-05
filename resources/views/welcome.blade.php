<!DOCTYPE html>
<html>
<head>
    <title>Office Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mb-4">Office Management System</h1>
                
                <div class="d-grid gap-3">
                    <a href="{{ route('equipment.index') }}" class="btn btn-primary btn-lg">
                        Manage Equipment
                    </a>
                    
                    <a href="{{ route('users.index') }}" class="btn btn-success btn-lg">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
