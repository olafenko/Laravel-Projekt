<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function loginView(){
        return view("auth.login",["page_title" => "Logowanie"]);
    }

    public function login(Request $request)
    {
        $authResult = $this->authService->authenticate($request);

        if($authResult){
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return back()->withErrors([
            "username" => "Dane niepoprawne",
        ])->onlyInput("username");
    }

    public function logout(Request $request){

        $this->authService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();;

        return redirect("/");
    }

    public function registerView(){
        return view("auth.register",["page_title" => "Rejestracja"]);
    }



}
