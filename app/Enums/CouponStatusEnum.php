<?php

namespace App\Enums;

enum CouponStatusEnum: string
{
    case Running = 'running';
    case Expired = 'expired';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Running => 'Running',
            self::Expired => 'Expired',
        };
    }
}
