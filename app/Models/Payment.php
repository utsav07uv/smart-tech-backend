<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'order_number',
        'method',
        'amount',
        'currency',
        'transaction_id',
        'meta',
        'status',
        'receipt'
    ];

    protected function casts(): array
    {
        return [
            'status' => PaymentStatus::class
        ];
    }

    public function orderVendor()
    {
        return $this->belongsTo(OrderVendor::class, 'order_vendor_id', 'id');
    }

    public function customer () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
