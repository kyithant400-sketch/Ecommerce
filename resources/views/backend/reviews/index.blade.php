@extends('backend.layouts.master')

@section('content')
    
<table class="table">
    <thead>
        <tr><th>Product</th><th>User</th><th>Rating</th><th>Comment</th></tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->product->name }}</td>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->rating }} Stars</td>
            <td>{{ $review->comment }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection