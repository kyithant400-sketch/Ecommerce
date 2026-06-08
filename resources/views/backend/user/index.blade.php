@extends('backend.layouts.master')
@section('content')
<div class="contentbar">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Registered Users</h2>
        @can('user.create')
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
        @endcan
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->implode(', ') }}</td> 
                <td>
                    @can('user.edit')
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        @can('user.delete')
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>  
                        @endcan
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection