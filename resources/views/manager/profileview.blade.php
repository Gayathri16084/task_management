@extends("manager.layout")
@section("title","editprofile")
@section("content")
<div class="container py-5">
  <div class="card mx-auto shadow-sm border-0" style="max-width: 500px;">
    <div class="card-body text-center">
      <form action="{{ route("manager.profileedit") }}">
      <img src="{{ asset('storage/'.$profile->image)  }}" alt="Profile" width="120" height="120" class="rounded-circle mb-3 border">
      <h3 class="fw-bold text-primary mb-3">{{ $profile->name ?? 'Not Assigned'}}</h3>

      <div class="text-start px-4">
        <p class="mb-2"><strong>Email:</strong> {{ $profile->email ?? session('user_name')??'Not Assigned'}}</p>
        <p class="mb-2"><strong>Department:</strong> {{ $profile->department ??session('user_email')?? 'Not Assigned' }}</p>
        <p class="mb-0"><strong>Phone Number:</strong> {{ $profile->phone ?? 'Not Provided' }}</p>
        <button type="submit">edit</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection