<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'discount',
        'total'
    ];

     public function calculateDiscount()
    {
        if (is_null($this->discount) || $this->discount <= 0) {
            return 0;
        }

        return ($this->discount / 100) * $this->price;
    }

    public function order () {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product () {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
