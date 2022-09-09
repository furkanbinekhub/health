<?php

namespace App\Traits;



use Illuminate\Http\Request;

trait AuthTrait
{

    protected function attempt($type)
    {
        $credentials = \request()->only(["email", "password"]);
        return auth()->guard($type)->attempt($credentials);
    }

}
