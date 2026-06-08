@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <h3>Create New Role</h3>
    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Permissions:</label><br>
            @foreach($permissions as $permission)
                <input type="checkbox" name="permission[]" value="{{ $permission->name }}"> {{ $permission->name }} <br>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Save Role</button>
    </form>
</div>
@endsection