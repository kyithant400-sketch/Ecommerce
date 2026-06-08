@extends('backend.layouts.master')
@section('content')
<div class="contentbar">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>All Orders</h2>
    
    <a href="{{ route('admin.dashboard') }}" class="btn btn-info">Back</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>address</th>
                <th>Products</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th></tr></thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>
                    @foreach($order->products as $product)
                        <span class="badge badge-light">{{ $product->name }}</span>
                    @endforeach
                </td>
                <td>{{ $order->total_price }}</td>
                <td>
                    <span class="badge 
                        {{ $order->status == 'completed' ? 'badge badge-success' : 
                        ($order->status == 'pending' ? 'badge badge-warning' : 'badge badge-danger') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @can('order.accept')
                        <button type="submit" class="btn btn-sm btn-success">Accept</button>
                        @endcan
                    </form>

                    <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @can('order.cancle')
                        <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')">Cancel</button>
                        @endcan
                    </form>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE') 
                        @can('order.delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection