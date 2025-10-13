@extends("manager.layout")

@section("title", "Employee List")

@section("content")
       <div >
      <a href="{{ route("manager.addview") }}"><button type="button" class="btn btn-sm btn-success">ADD Employee</button></a>
      </div>
  <div class="container my-4">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Employee List</h5>
        
      </div>
      
      <div class="card-body">
      
        <table class="table table-striped align-middle text-center">
          <thead class="table-primary">
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Department</th>
              <th>Phone</th>
              <th>Works</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employees as $employee)
            <tr>
              <td>{{ $employee->id }}</td>
              <td><img src="{{ asset('storage/'.$employee->image) }}" width="40" height="40" class="rounded-circle" alt="Employee"></td>
              <td>{{ $employee->name }}</td>
              <td>{{ $employee->email }}</td>
              <td>{{ $employee->department }}</td>
              <td>{{ $employee->phone }}</td>
              <td><a href="#" class="btn btn-sm btn-success">Assign</a></td>
              <td>
                <a href="{{ route("manager.updtable",$employee->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                <a href="{{ route("manager.deletedata",$employee->id) }}" class="btn btn-sm btn-warning me-1">delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
