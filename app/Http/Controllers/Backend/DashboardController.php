<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
//use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['totalCategories'] = Category::count();
        $data['totalProducts'] = Product::count();
        $data['totalOrders'] = Order::count();
        
        $data['totalUsers'] = User::where('role', '!=', 'admin')->count(); 

        //Top Selling Products
        $data['topProducts'] = Product::withCount('orders') 
                                        ->orderBy('orders_count', 'desc')
                                        ->take(5)
                                        ->get();
        

        return view('backend.admin', $data);
    }
}
