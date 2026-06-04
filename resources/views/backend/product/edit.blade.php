@extends('backend.layouts.master')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header"><h4>Edit Product</h4></div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="mb-3">
                    <label>Current Image</label><br>
                    <img src="{{ asset('storage/'.$product->image) }}" width="100" class="mb-2">
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection