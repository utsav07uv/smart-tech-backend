<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class OrderVendor extends Model
{
    protected $fillable = [
        'order_id',
        'vendor_id',
        'subtotal',
        'discount_amount',
        'gst',
        'shipping_cost',
        'total',
        'status',
        'cancelled_at',
    ];

     protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
        ];
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_vendor_id', 'id');
    }

    public function totalPrice() {
        return $this->orderItems->sum(fn($i) => $i->product->price * $i->quantity);
    }

    public function totalDiscount() {
        return $this->orderItems->sum(fn($i) => $i->product->calculateDiscount() * $i->quantity);
    }

    public function payments () {
        return $this->hasMany(Payment::class, 'order_vendor_id', 'id');
    }
}
