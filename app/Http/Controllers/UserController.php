<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function profile($id){

        $model = $this->userService->getUserById($id);
        return view("user.profile",["model"=>$model,"page_title" => "Profil użytkownika"]);
    }

}
