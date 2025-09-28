<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
    case REFUNDED = 'refunded';


    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::COMPLETED => 'Completed',
            self::FAILED => 'Failed',
            self::REFUNDED => 'Refunded',
        };
    }

    public function bgColor(): string
    {
        return match ($this) {
            self::PENDING => 'bg-warning',
            self::COMPLETED  => 'bg-success',
            self::FAILED  => 'bg-danger',
            self::REFUNDED   => 'bg-secondary',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::PENDING => 'text-warning',
            self::COMPLETED  => 'text-success',
            self::FAILED  => 'text-danger',
            self::REFUNDED   => 'text-secondary',
        };
    }


    public static function pluck()
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray();
    }
}
