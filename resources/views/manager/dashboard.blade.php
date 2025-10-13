@extends("manager.layout")

@section("title", "Dashboard")

@section("content")
  <h1 class="h4 fw-bold mb-4">dashboard</h1>

  <div class="row g-3">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title fw-semibold">Total Employees</h5>
          <p class="display-6 mt-2">{{ $totalEmployees }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title fw-semibold">Leads</h5>
          <p class="display-6 mt-2">{{ $totalLeads }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title fw-semibold">Messages</h5>
          <p class="display-6 mt-2">0</p>
        </div>
      </div>
    </div>
  </div>
@endsection
