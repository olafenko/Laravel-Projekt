<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

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

    public function editProfileView($id){
        $model = $this->userService->getUserById($id);
        return view("user.profileEdit",["model"=>$model,"page_title" => "Edycja profilu"]);
    }

    public function editProfile(Request $request, $id){

        $this->userService->edit($request,$id);
        return redirect("/user/profile/" . $id);
    }

    public function passwordChangeView($id){
        $model = $this->userService->getUserById($id);
        return view("user.passwordEdit",["model"=>$model,"page_title" => "Zmiana hasła"]);
    }

    public function passwordChange(Request $request, $id){
        $this->userService->changePassword($request,$id);
        return redirect("/user/profile/" . $id);
    }

    public function deactivateAccount(Request $request,$id){
        $this->userService->deactivate($id);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }



}
