@extends('backend.layouts.master')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="contentbar">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Registered Users</h2>
        
        <a href="{{ route('home') }}" class="btn btn-info">Back</a>
    </div>
        <table class="table">
        <thead><tr><th>Name</th><th>Email</th><th>Action</th></tr></thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> </button>
                    </form>
                </td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection