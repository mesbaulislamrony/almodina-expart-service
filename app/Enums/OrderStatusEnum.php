<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case Started = 'started';
    case Accepted = 'accepted';
    case Pending = 'pending';
    case Completed = 'completed';
    case Canceled = 'canceled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Started => 'Started',
            self::Accepted => 'Accepted',
            self::Pending => 'Pending',
            self::Completed => 'Completed',
            self::Canceled => 'Canceled',
        };
    }
}
