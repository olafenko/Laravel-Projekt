<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function authenticate(Request $request) : bool
    {

        $credentials = $request->validate([
           "username" => "required",
           "password" => "required"
        ]);

        return Auth::attempt($credentials);

    }

    public function logout() : void
    {
        Auth::logout();
    }
}
