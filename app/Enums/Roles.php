<?php

namespace App\Enums;


class Roles
{
    const ADMIN = 'Administrador';
    const TUTOR = 'Tutor';

    public static function getRoles(): array
    {
        return [
            self::ADMIN,
            self::TUTOR,
        ];
    }
}

