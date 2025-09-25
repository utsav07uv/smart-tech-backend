<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'approved_at',
        'avatar',
        'documents',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'approved_at' => 'datetime',
            'password' => 'hashed',
            'documents' => 'array',
            'role' => UserRole::class
        ];
    }

    public function avatar (): Attribute 
    {
        return Attribute::make(
            get: fn ($value) => $value ? Storage::disk('public')->url($value) : asset('assets/img/default-avatar.svg'),
        );
    }

    public function documents (): Attribute 
    {
        return Attribute::make(
            get: fn ($value) => $value ? array_map(fn($item) => Storage::disk('public')->url($item), json_decode($value, true)) : [],
        );
    }

    public function isApproved(): bool {
        return !is_null($this->approved_at);
    }

    public function wishlist () {
        return $this->hasOne(Wishlist::class, 'user_id', 'id');
    }

    public function cart () {
        return $this->hasOne(Cart::class, 'user_id', 'id');
    }
}
