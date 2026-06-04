@extends('frontend.layouts.master')

@section('content')
<div class="container py-5">
    <h2>Checkout</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('order.place') }}" method="POST">
                @csrf
                <h4>Billing Details</h4>
                <div class="form-group mb-3">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Delivery Address</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-lg">Place Order</button>
            </form>
        </div>

        <div class="col-md-4">
            <h4>Your Order</h4>
            <ul class="list-group">
                @php $total = 0; @endphp
                @foreach(session('cart') as $details)
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>{{ $details['name'] }}</h6>
                            <small>Qty: {{ $details['quantity'] }}</small>
                        </div>
                        <span>{{ $details['price'] * $details['quantity'] }} MMK</span>
                    </li>
                    @php $total += ($details['price'] * $details['quantity']); @endphp
                @endforeach
                <li class="list-group-item active">
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>{{ $total }} MMK</strong>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection