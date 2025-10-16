@extends("manager.layout")
@section("title","leads")
@section("content")

<div >
      <a href="{{ route("manager.leadsstoretable") }}"><button type="button" class="btn btn-sm btn-success"> add leads</button></a>
      </div>
  <div class="container my-4">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Leads</h5>
        
      </div>
      
      <div class="card-body">
      
        <table class="table table-striped align-middle text-center">
          <thead class="table-primary">
            <tr>
              <th>ID</th>
              <th>company</th>
              <th>loaction</th>
              <th>field_of_recuirement</th>
              <th>how many candidate</th>
              <th>Days</th>
              
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leads as $lead)
            <tr>
              <td>{{ $lead->id }}</td>
              
              <td>{{ $lead->company_name}}</td>
              <td>{{ $lead->location }}</td>
              <td>{{ $lead->field_of_requirement }}</td>
              <td>{{ $lead->candidate_number }}</td>
              <td>{{ $lead->days }}</td>
              
              <td>
              <form action="{{ route('manager.leads.delete', $lead->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('Are you sure you want to delete this lead?')">
        Delete
    </button>
</form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


@endsection