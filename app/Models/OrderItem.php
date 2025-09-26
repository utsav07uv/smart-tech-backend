<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_vendor_id',
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

    public function orderVendor () {
        return $this->belongsTo(OrderVendor::class, 'order_vendor_id', 'id');
    }

    public function product () {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
