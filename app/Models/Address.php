<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'is_default'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
