<?php

namespace App\Enums;

enum AddressTypeEnum: string
{
    case Home = 'home';
    case Office = 'office';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Home => 'Home',
            self::Office => 'Office',
        };
    }
}
