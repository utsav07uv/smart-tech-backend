<?php

namespace App\Models;

use App\Models\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;

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

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
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
            get: fn($value) => $value ? array_map(fn($item) => Storage::disk('public')->url($item), json_decode($value)) : [],
        );
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function calculateDiscount()
    {
        if (is_null($this->discount) || $this->discount <= 0) {
            return 0;
        }

        return ($this->discount / 100) * $this->price;
    }

    #[Scope]
    public function active(Builder $query) {
        $query->where('status', 1);
    }

    #[Scope]
    public function recommended(Builder $query) {
        $query->where('section_id', 1);
    }

    #[Scope]
    public function coming(Builder $query) {
        $query->where('section_id', 2);
    }
}
