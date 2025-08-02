<?php

namespace App\Enums;

enum CouponTypeEnum: string
{
    case Fixed = 'fixed';
    case Percentage = 'percentage';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Fixed => 'Fixed',
            self::Percentage => 'Percentage',
        };
    }
}
