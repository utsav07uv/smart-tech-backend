<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';


    public function label(): string
    {
        return match ($this) {
            self::PROCESSING => 'Processing',
            self::SHIPPED => 'Shipped',
            self::DELIVERED => 'Delivered',
            self::CANCELLED => 'Cancelled',
            self::REFUNDED => 'Refunded',
        };
    }

    public function bgColor(): string
    {
        return match ($this) {
            self::PROCESSING => 'bg-warning',   
            self::SHIPPED    => 'bg-info',      
            self::DELIVERED  => 'bg-success',   
            self::CANCELLED  => 'bg-danger',    
            self::REFUNDED   => 'bg-secondary', 
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::PROCESSING => 'text-warning',
            self::SHIPPED    => 'text-info',
            self::DELIVERED  => 'text-success',
            self::CANCELLED  => 'text-danger',
            self::REFUNDED   => 'text-secondary',
        };
    }


    public static function pluck()
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray();
    }
}
