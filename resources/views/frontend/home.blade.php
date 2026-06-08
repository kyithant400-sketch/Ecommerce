@extends('frontend.layouts.master')

@section('content')
<div class="text-center my-4">
    <a href="{{ route('home') }}" class="btn btn-outline-primary m-1">All Products</a>
    @foreach(\App\Models\Category::all() as $cat)
        <a href="{{ route('category.products', $cat->id) }}" class="btn btn-outline-primary m-1">
            {{ $cat->name }}
        </a>
    @endforeach
</div>
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ isset($category) ? $category->name : 'Our Products' }}</h2>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 d-flex"> <div class="card mb-4 w-100 shadow-sm"> <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top custom-product-img" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text mt-auto">Price: {{ $product->price }} MMK</p> 
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm w-100 mb-2">View Details</a>
                    <form id="cart-form-{{ $product->id }}">
                        @csrf
                        <button type="button" class="btn btn-success w-100" onclick="addToCart({{ $product->id }})">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        </div> 

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
        </div>
    </div>
</div>
@endsection
<style>
    .custom-product-img {
        height: 200px;
        object-fit: cover; 
        width: 100%;
    }
    
    .card {
        display: flex;
        flex-direction: column;
    }

    .star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 5px;
    }
    .star-rating input { display: none; }
    .star-rating label {
        font-size: 25px;
        color: #ccc;
        cursor: pointer;
    }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f39c12;
    }
</style>