@extends("manager.layout")
@section("title","add an employee")


@section("content")

<div class="container mt-5">
    <h2 class="mb-4 text-center">Add lead</h2>

    <form action="{{ route('manager.leadsstore') }}" method="POST" class="mx-auto" style="max-width: 500px;">
    @csrf

    <div class="mb-3">
        <label for="company_name" class="form-label">Company Name</label>
        <input type="text" class="form-control" id="company_name" name="company_name">
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" name="location" class="form-control" id="location">
    </div>

    <div class="mb-3">
        <label for="field_of_requirement" class="form-label">Field of Requirement</label>
        <input type="text" name="field_of_requirement" class="form-control" id="field_of_requirement">
    </div>

    <div class="mb-3">
        <label for="candidate_number" class="form-label">Candidate Number</label>
        <input type="number" name="candidate_number" class="form-control" id="candidate_number">
    </div>

    <div class="mb-3">
        <label for="days" class="form-label">Days</label>
        <input type="number" name="days" class="form-control" id="days">
    </div>

    <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>




@endsection
