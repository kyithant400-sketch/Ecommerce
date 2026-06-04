@extends('backend.layouts.master')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Product Lists</h3>
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Add Product</a>
            <a href="{{ route('backend.admin') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/'.$product->image) }}" width="50"></td>
                <td>{{ $product->name }}</td>
                <td>
                    {{ $product->category ? $product->category->name : 'No Category' }}
                </td>
                <td>{{$product->price}}</td>
                <td>{{ $product->description}}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection