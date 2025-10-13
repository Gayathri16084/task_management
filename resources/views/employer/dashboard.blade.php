<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .sidebar {
      width: 250px;
      background-color: #212529;
      color: white;
      min-height: calc(100vh - 56px);
      padding: 20px;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background-color: #343a40;
    }
    main {
      flex: 1;
      padding: 20px;
    }
    footer {
      background-color: #212529;
      color: white;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success px-3">
    <a class="navbar-brand fw-bold" href="#">HungryBird</a>

    <div class="ms-auto dropdown">
      <button class="btn btn-success dropdown-toggle d-flex align-items-center" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://via.placeholder.com/32" alt="Profile" class="rounded-circle me-2">
        <span>{{ session('role') }}</span>
      </button>

      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
        <li class="px-3 py-2 border-bottom">
          <p class="fw-semibold mb-0">Employer Name</p>
          <small class="text-muted">{{ session('role') }}</small>
        </li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="d-flex flex-grow-1">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h4 class="fw-semibold mb-4">Menu</h4>
      <a href="#">Dashboard</a>
      <a href="#">My Tasks</a>
      <a href="#">Pending Tasks</a>
      <a href="#">Messages</a>
    </aside>

    <!-- Main Content -->
    <main class="flex-fill">
      <h1 class="h4 fw-bold mb-4">Welcome, Employer</h1>

      <div class="row g-3">
        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-body text-center">
              <h5 class="card-title fw-semibold">Total Tasks</h5>
              <p class="display-6 mt-2">8</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-body text-center">
              <h5 class="card-title fw-semibold">Pending Tasks</h5>
              <p class="display-6 mt-2">3</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-body text-center">
              <h5 class="card-title fw-semibold">Messages</h5>
              <p class="display-6 mt-2">1</p>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 Work Management System
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
