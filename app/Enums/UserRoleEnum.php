<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case Employee = 'employee';
    case Vendor = 'vendor';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Employee => 'Employee',
            self::Vendor => 'Vendor',
        };
    }
}
