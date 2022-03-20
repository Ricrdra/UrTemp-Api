<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Role;

class RoleController extends Controller
{
    public function getAllAdmins(string $role): UserCollection
    {
        $role = Role::where('name', $role)->first();

        $users = $role->users;
        return new UserCollection($users);
    }
}
