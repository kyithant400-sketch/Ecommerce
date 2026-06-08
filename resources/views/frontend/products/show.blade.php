@extends('frontend.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p>Price: {{ $product->price }} MMK</p>
            <p>Description: {{ $product->description }}</p>
        </div>

        <div class="col-md-6">
            <h3>For Review</h3>
            <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                @csrf
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
                </div>
                <textarea name="comment" class="form-control" placeholder="Enter Comment..." required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Review</button>
                <a href="{{route('home')}}" class="btn btn-danger mt-2">Back</a>
            </form>

            <hr>
            
            <h4>Customer's Reviews</h4>
            @foreach($product->reviews as $review)
                <div class="card mb-2">
                    <div class="card-body">
                        <strong>{{ $review->comment }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<style>
.star-rating { display: flex; flex-direction: row-reverse; justify-content: flex-start; gap: 5px; }
.star-rating input { display: none; }
.star-rating label { font-size: 30px; color: #ccc; cursor: pointer; }
.star-rating input:checked ~ label, .star-rating label:hover, .star-rating label:hover ~ label { color: #f39c12; }
</style>