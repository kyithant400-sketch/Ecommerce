@extends('backend.layouts.master')
@section('content')
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Category List</h3>
        <div>
            @can('category.create')
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Add New</a>
            @endcan
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>No</th><th>Name</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @can('category.edit')
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        @can('category.delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection