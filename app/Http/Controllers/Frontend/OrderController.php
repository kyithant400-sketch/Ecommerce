<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart.index', compact('cart'));
    }
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to checkout.');
        }
        
        $cart = session()->get('cart', []);
        return view('frontend.cart.checkout', compact('cart'));
    }

    
    public function placeOrder(Request $request)
    {
        // ၁။ Validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('home')->with('error', 'Your cart is empty!');
        }
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += ($item['price'] * $item['quantity']);
        }
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice, 
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'pending',
        ]);
        foreach ($cart as $id => $details) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }
        session()->forget('cart');
        
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
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
        return response()->json([
            'message' => 'Product added to cart!',
            'total_count' => array_sum(array_column($cart, 'quantity'))
        ]);
    }
    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed successfully!');
    }
}
