@extends('backend.layouts.master')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header"><h4>Create New Category</h4></div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-success">Save Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection