<?php

namespace App\Models;

use App\Models\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[ScopedBy(ProductScope::class)]
class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'size',
        'sku',
        'model',
        'stock',
        'price',
        'discount',
        'image',
        'images',
        'category_id',
        'section_id',
        'user_id',
        'status',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class, 'product_id', 'id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
        );
    }

    public function images(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? array_map(fn ($item) => Storage::disk('public')->url($item) ,json_decode($value)) : [],
        );
    }
}
