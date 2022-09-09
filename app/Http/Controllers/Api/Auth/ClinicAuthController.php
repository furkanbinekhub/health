<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Clinic;
use App\Traits\AuthTrait;

class ClinicAuthController extends Controller
{
    use AuthTrait;

    public function login(LoginRequest $request)
    {
        dd('asdasd');
        if (! $this->attempt(Clinic::GUARD)) {
            return response()->json([
                "error" => "Invalid Credentials"
            ], 422);
        }

        $clinic = Clinic::where('email', $request->email)->first();
        $authToken = $clinic->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token' => $authToken,
            'clinic' => $clinic
        ]);

    }
}
