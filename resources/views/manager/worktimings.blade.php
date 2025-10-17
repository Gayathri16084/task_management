@extends('manager.layout')
@section("title","Work Timings")
@section("content")

<div class="container mt-4">
    <h1 class="h4 fw-bold mb-4">Work Timings</h1>
    <p class="mb-4">This is the Work Timings page for the Manager.</p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Email</th>
                    <th>Login Time</th>
                    <th>Logout Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timings as $timing)
                <tr>
                    <td>{{ $timing->email }}</td>
                    <td>{{ $timing->login_time ? \Carbon\Carbon::parse($timing->login_time)->format('d-m-Y H:i:s') : '-' }}</td>
                    <td>{{ $timing->logout_time ? \Carbon\Carbon::parse($timing->logout_time)->format('d-m-Y H:i:s') : '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
