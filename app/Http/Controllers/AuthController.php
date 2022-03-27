<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (password_verify($request->password, $user->password)) {
            $user->token = Hash::make($this->quickRandom(6));
            $user->save();
            return json_encode([
                'user' => $user,
                'token' => $user->token,
                'message' => 'Login Successfully',
                'advices' => 'Save this token for future use'], 200);
        }

        return json_encode(['error' => 'Invalid credentials']);
    }

    private function quickRandom($length = 16): string
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function logout(Request $request): bool|string
    {
        $user = User::find($request->user_id);
        if ($request->token === $user->token) {
            $user->token = null;
            $user->save();
        }
        return json_encode(['logged out' => true]);
    }
}
