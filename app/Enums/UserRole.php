<?php

namespace App\Enums;

enum UserRole: string
{
    case CUSTOMER = 'customer';
    case SELLER = 'seller';
    case ADMIN = 'admin';

    public function label () : string 
    {
        return match ($this) {
            self::CUSTOMER => 'Customer',
            self::SELLER =>  'Seller',
            self::ADMIN => 'Admin',
        };
    }

    public function isNotAdmin(): bool
    {
        return !in_array($this, [self::CUSTOMER, self::SELLER]);
    }

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    public function isSeller(): bool
    {
        return $this === self::SELLER;
    }

    public function isCustomer(): bool
    {
        return $this === self::CUSTOMER;
    }

    public static function pluck(): array 
    {
        return collect(self::cases())
                ->mapWithKeys(fn($case) => [$case->value => $case->label()])
                ->toArray();
    }
}