<?php

namespace App\Services;

use App\Models\User;
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

        $credentials["is_active"] = true;

        return Auth::attempt($credentials);

    }

    public function register(Request $request) : void
    {
        $credentials = $request->validate([
           "username" => ["required","unique:users,username","min:4","max:45","regex:/^[a-zA-Z0-9_]+$/"],
           "email" => ["required","email","unique:users,email"],
           "password" => ["required","min:8","regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"],
        ]);

        $user = User::create($credentials);

        Auth::login($user);
    }

    public function logout() : void
    {
        Auth::logout();
    }
}
