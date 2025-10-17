<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title")</title>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
    <a class="navbar-brand fw-bold" href="#">HungryBird</a>

    <div class="ms-auto dropdown">
      <button class="btn btn-primary dropdown-toggle d-flex align-items-center" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        
        <span>profile</span>
      </button>

      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
        <!-- <li class="px-3 py-2 border-bottom">
          <p class="fw-semibold mb-0">{{ session('user_name') }}
          <small class="text-muted">{{ session('role') }}</small>
        </li> -->
        <li><a class="dropdown-item" href="{{ route("manager.profileview") }}">Profile</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="d-flex flex-grow-1">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h4 class="fw-semibold mb-4">Menu</h4>
      <a href="{{ route("manager.dashboard") }}">Dashboard</a>
      <a href="{{ route('manager.employees') }}">All Employees</a>
      <a href="{{ route('manager.leads') }}">Leads</a>
      <a href="{{ route('manager.worktimings') }}">Worktimings</a>
      
    </aside>

    <!-- Page Content -->
    <main class="flex-fill">
      @yield("content")
    </main>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 Work Management System
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
