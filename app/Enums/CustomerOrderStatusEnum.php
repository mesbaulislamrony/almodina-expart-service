<?php

namespace App\Enums;

enum CustomerOrderStatusEnum: string
{
    case Pending = 'pending';
    case Completed = 'completed';
    case Canceled = 'canceled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Completed => 'Completed',
            self::Canceled => 'Canceled',
        };
    }
}
