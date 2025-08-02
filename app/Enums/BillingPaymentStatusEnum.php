<?php

namespace App\Enums;

enum BillingPaymentStatusEnum: string
{
    case Paid = 'paid';
    case Unpaid = 'unpaid';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Paid => 'Paid',
            self::Unpaid => 'Unpaid',
        };
    }
}
