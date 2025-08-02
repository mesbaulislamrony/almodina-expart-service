<?php

namespace App\Enums;

enum VendorOrderStatusEnum: string
{
    case Accepted = 'accepted';
    case Completed = 'completed';
    case Canceled = 'canceled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Accepted => 'Accepted',
            self::Completed => 'Completed',
            self::Canceled => 'Canceled',
        };
    }
}
