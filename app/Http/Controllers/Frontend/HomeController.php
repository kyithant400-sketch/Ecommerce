<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // တစ်မျက်နှာလျှင် 8 ခုစီ ပြပါမယ်
        $products = Product::paginate(8); 
        return view('frontend.home', compact('products'));
    }

    public function categoryProducts($id)
    {
        $category = Category::findOrFail($id);
        // Category အလိုက် Product များကိုလည်း pagination သုံးပေးပါ
        $products = Product::where('category_id', $id)->paginate(8); 
        
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
