<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class QueryResolvers
{


    public static function dateResolver($date): string
    {
        $date = Carbon::parse($date);
        return $date->toDateString();

    }

    public static function noResolve($value): string
    {
        return $value;
    }

}
