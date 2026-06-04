@extends('backend.layouts.master')

@section('content')
<div class="contentbar">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <div class="row">
        <div class="col-lg-3">
            <div class="card p-3 shadow-sm">
                <h5>Total Categories</h5>
                <h2>{{ $totalCategories }}</h2>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary btn-sm mt-2">View Details</a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-3 shadow-sm">
                <h5>Total Products</h5>
                <h2>{{ $totalProducts }}</h2>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-success btn-sm mt-2">View Details</a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-3 shadow-sm">
                <h5>Total Orders</h5>
                <h2>{{ $totalOrders }}</h2>
                {{-- <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-warning btn-sm mt-2">View Details</a> --}}
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-3 shadow-sm">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers }}</h2>
                {{-- <a href="{{ route('admin.users.index') }}" class="btn btn-outline-info btn-sm mt-2">View Details</a> --}}
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card p-3">
                <h4>Top Selling Products</h4>
                <table class="table">
                    <thead>
                        <tr><th>Product Name</th><th>Sales Count</th></tr>
                    </thead>
                    <tbody>
                        @foreach($topProducts as $product)
                        <tr><td>{{ $product->name }}</td><td>{{ $product->orders_count }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection