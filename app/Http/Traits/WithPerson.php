<?php

namespace App\Http\Traits;

use App\Models\Person;

trait WithPerson
{
    public static function store($request)
    {
        $person = new Person();
        $person->name = $request->name;
        $person->last_name = $request->last_name;
        $person->phone_number = $request->phone_number;
        $person->save();
    }


}
