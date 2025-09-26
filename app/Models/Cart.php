<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user () {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cartItems () {
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }

    public function totalPrice() {
        return $this->cartItems->sum(fn($i) => $i->product->price * $i->quantity);
    }

    public function totalDiscount() {
        return $this->cartItems->sum(fn($i) => $i->product->calculateDiscount() * $i->quantity);
    }
}
