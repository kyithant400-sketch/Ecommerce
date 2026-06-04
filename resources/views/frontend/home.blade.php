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
                <div class="card-body d-flex flex-column"> <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text mt-auto">Price: {{ $product->price }} MMK</p> <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-primary" onclick="addToCart({{ $product->id }})">
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
</style>