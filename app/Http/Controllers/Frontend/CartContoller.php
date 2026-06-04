<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
public function add(Request $request, $id) 
{
    return response()->json([
        'success' => true,
        'total_count' => count(session('cart', [])) 
    ]);
}
}