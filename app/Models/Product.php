<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'price', 'description', 'image'];

    public function category() {
        return $this->belongsTo(\App\Models\Category::class);
    }
    public function orderDetails() {
    return $this->hasMany(OrderDetail::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }
}
