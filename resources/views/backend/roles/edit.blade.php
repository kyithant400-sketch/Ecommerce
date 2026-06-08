@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <h3>Edit Role</h3>
    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <div class="mb-3">
            <label>Permissions:</label><br>
            @foreach($permissions as $permission)
                <input type="checkbox" name="permission[]" value="{{ $permission->name }}" 
                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}> {{ $permission->name }} <br>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Update Role</button>
    </form>
</div>
@endsection