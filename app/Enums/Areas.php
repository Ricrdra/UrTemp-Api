<?php

namespace App\Enums;


class Areas
{
    const MULTI = 'Multiplataforma';
    const NETWORK = 'Redes';
    const DIGITAL_ENVIRONMENT = 'Entornos-Digitales';

    public static function getAreas(): array
    {
        return [
            self::MULTI,
            self::NETWORK,
            self::DIGITAL_ENVIRONMENT
        ];
    }
}

