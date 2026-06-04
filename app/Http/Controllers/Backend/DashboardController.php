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
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::where('role', '!=', 'admin')->count(); 

        // Top Selling Products
        $topProducts = Product::withCount('orders') 
                            ->orderBy('orders_count', 'desc')
                            ->take(5)
                            ->get();

        return view('backend.admin', compact('totalCategories', 'totalProducts', 'totalOrders', 'totalUsers', 'topProducts'));
    }
}
