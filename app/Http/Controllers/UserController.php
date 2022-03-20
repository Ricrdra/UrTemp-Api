<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Traits\WithPerson;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): UserCollection
    {
        return new UserCollection(User::all());
    }

    public function store(Request $request): JsonResponse
    {

        WithPerson::store($request);
        $user = User::create($request->all());
        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }


    public function update(Request $request, User $user): UserResource
    {
        $user->update($request->all());
        return new UserResource($user);

    }

    public function destroy(User $user): bool|string
    {
        WithPerson::delete($user->person);
        $user->delete();
        return json_encode(['success' => true]);
    }
}
