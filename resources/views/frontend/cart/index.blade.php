@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h2>Your Shopping Cart</h2>
    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }} MMK</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            <h4>Total: 
                {{ array_sum(array_map(function($item) { 
                    return $item['price'] * $item['quantity']; 
                }, session('cart'))) }} MMK
            </h4>
        </div>
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
        <a href="{{route('home')}}" class="btn btn-danger">Back</a>
    @else
        <p>Your cart is empty!</p>
        <a href="{{route('home')}}" class="btn btn-danger">Back</a>
    @endif
</div>
@endsection