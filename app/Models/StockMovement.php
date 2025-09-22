<?php

namespace App\Models;

use App\Enums\StockMovementType;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'product_id',
        'type',
        'quantity',
        'reference',
        'note',
        'user_id'
    ];

    protected function casts(): array
    {
        return [
            'type' => StockMovementType::class,
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
