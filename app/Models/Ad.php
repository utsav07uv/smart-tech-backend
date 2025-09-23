<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\get;

class Ad extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'offer',
        'description',
        'image',
        'url',
        'placement',
        'status',
        'order',
        'created_by',
    ];

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value ? Storage::disk('public')->url($value) : null,
        );
    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
