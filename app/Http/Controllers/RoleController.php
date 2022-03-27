<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return json_encode(Role::all());
    }
}
