<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'subtotal',
        'discount_amount',
        'shipping_cost',
        'gst',
        'total',
        'status',
        'shipping_address_id',
        'order_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
            'order_at' => 'datetime'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderVendors()
    {
        return $this->hasMany(OrderVendor::class, 'order_id', 'id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id', 'id');
    }
}
