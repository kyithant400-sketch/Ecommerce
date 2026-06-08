@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Roles List</h3>
        @can('role.create')
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create New Role</a>
        @endcan
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Role Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @can('role.edit')
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        @can('role.delete')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection