<?php

namespace App\Enums;

enum StockMovementType: string
{
    case IN = 'in';
    case OUT = 'out';

    public function label(): string
    {
        return match ($this) {
            self::IN => 'In',
            self::OUT => 'Out',
        };
    }

    public function bgColor(): string
    {
        return match ($this) {
            self::IN => 'bg-green-50',
            self::OUT => 'bg-red-50',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::IN => 'text-green-500',
            self::OUT => 'text-red-500',
        };
    }

    public static function pluck()
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray();
    }
}
