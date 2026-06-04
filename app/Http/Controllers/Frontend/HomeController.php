<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.home', compact('products'));
    }
    public function categoryProducts($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        $products = \App\Models\Product::where('category_id', $id)->get();
        
        // home.blade.php 
        return view('frontend.home', compact('products', 'category'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $cart = session()->get('cart', []);

        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
