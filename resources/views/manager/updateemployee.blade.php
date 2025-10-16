@extends("manager.layout")
@section("title","add an employee")


@section("content")

<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Employee</h2>

    <form action="{{ route('manager.update',$employees->id) }}" method="POST" class="mx-auto" style="max-width: 500px;" enctype="multipart/form-data">
        @csrf 
       



        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" value="{{ $employees->image }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $employees->name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $employees->email }}">
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">departmet</label>
            <input type="text" name="department" class="form-control" id="department" placeholder="Enter branch" value="{{ $employees->department }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" value="{{ $employees->phone }}">
        </div>

      

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>



@endsection
