<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function adminIndex()
    {
        $orders = Order::with('products')->latest()->get();
        
        return view('backend.order.index', compact('orders'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total = 0;
    foreach(session('cart') as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    $order = \App\Models\Order::create([
        'user_id' => Auth::id(),
        'total_price' => $total,
        'status' => 'pending'
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('success', 'Order Deleted Successfully!');
    }

    public function accept($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Order accepted successfully!');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Order cancelled!');
    }

    
}
