<?php

namespace App\Enums;


class Roles
{
    const ADMIN = 'administrator';
    const TUTOR = 'tutor';
    const REGISTER = 'register';

    public static function getRoles(): array
    {
        return [
            self::ADMIN,
            self::TUTOR,
        ];
    }
}

