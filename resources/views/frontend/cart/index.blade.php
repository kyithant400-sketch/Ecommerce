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
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }} MMK</td>
                    <td>{{ $details['quantity'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
        <a href="{{route('home')}}" class="btn btn-danger">Back</a>
    @else
        <p>Your cart is empty!</p>
    @endif
</div>
@endsection