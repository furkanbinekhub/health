<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Traits\AuthTrait;

class UserAuthController extends Controller
{
    use AuthTrait;

    public function login(LoginRequest $request)
    {
        if ($this->attempt(User::GUARD)){
            return response()->json([
                "error" => "Invalid Credentials"
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token' => $authToken,
            'user' => $user
        ]);

    }
}
