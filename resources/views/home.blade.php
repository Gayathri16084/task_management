<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container text-center mt-5">
    <h1 class="mb-4">Welcome</h1>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h2 class="mb-3">Manager</h2>
                <a href="{{ route('login.form', ['role' => 'manager']) }}" class="btn btn-primary mb-2 w-100">Login</a>
                <a href="{{ route('register.form', ['role' => 'manager']) }}" class="btn btn-success w-100">Register</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h2 class="mb-3">Employer</h2>
                <a href="{{ route('login.form', ['role' => 'employer']) }}" class="btn btn-primary mb-2 w-100">Login</a>
                <a href="{{ route('register.form', ['role' => 'employer']) }}" class="btn btn-success w-100">Register</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, for interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
