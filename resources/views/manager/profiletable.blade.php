@extends('manager.layout') {{-- or your main layout --}}
@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center text-primary mb-4">Edit Profile</h3>

        <form action="{{ route('manager.profileupdate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

            <!-- <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><strong>Email</strong></label>
                <input type="email" name="email" class="form-control" required>
            </div> -->

            <div class="mb-3">
                <label for="department" class="form-label"><strong>Department</strong></label>
                <input type="text" name="department" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label"><strong>Phone Number</strong></label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Update</button>
                <a href="{{ route('manager.profileview') }}" class="btn btn-secondary px-4">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
