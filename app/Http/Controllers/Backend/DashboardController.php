<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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

        $totalIncome = Order::where('status', 'completed')
                                 ->where('total_price', '>', 0)
                                 ->sum('total_price');

        $monthlyIncome = Order::where('status', 'completed')
                                 ->whereMonth('created_at', Carbon::now()->month)
                                 ->whereYear('created_at', Carbon::now()->year)
                                 ->sum('total_price');
        return view('backend.admin', compact('totalCategories', 'totalProducts', 'totalOrders', 'totalUsers', 'topProducts', 'totalIncome', 'monthlyIncome'));
    }
}
