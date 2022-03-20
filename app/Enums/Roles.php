<?php

namespace App\Enums;


class Roles
{
    const ADMIN = 'administrator';
    const TUTOR = 'tutor';

    public static function getRoles(): array
    {
        return [
            self::ADMIN,
            self::TUTOR,
        ];
    }
}

