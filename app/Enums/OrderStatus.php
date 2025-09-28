<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PAYMENTPENDING = 'payment-pending';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case PARTIALLYDELIVERED = 'partially-delivered';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';


    public function label(): string
    {
        return match ($this) {
            self::PAYMENTPENDING => 'Payment Pending',
            self::PROCESSING => 'Processing',
            self::SHIPPED => 'Shipped',
            self::DELIVERED => 'Delivered',
            self::PARTIALLYDELIVERED => 'Partially Delivered',
            self::CANCELLED => 'Cancelled',
            self::REFUNDED => 'Refunded',
        };
    }
    public function bgColor(): string
    {
        return match ($this) {
            self::PAYMENTPENDING, self::PROCESSING =>
            'bg-warning bg-yellow-50',
            self::SHIPPED =>
            'bg-info bg-blue-50',
            self::DELIVERED, self::PARTIALLYDELIVERED =>
            'bg-success bg-green-50',
            self::CANCELLED =>
            'bg-danger bg-red-50',
            self::REFUNDED =>
            'bg-secondary bg-gray-50',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::PAYMENTPENDING, self::PROCESSING =>
            'text-warning text-yellow-500',
            self::SHIPPED =>
            'text-info text-blue-500',
            self::DELIVERED, self::PARTIALLYDELIVERED =>
            'text-success text-green-500',
            self::CANCELLED =>
            'text-danger text-red-500',
            self::REFUNDED =>
            'text-secondary text-gray-500',
        };
    }


    public static function pluck()
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()])->toArray();
    }
}
