@extends('backend.layouts.master')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header"><h4>Edit Category</h4></div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection