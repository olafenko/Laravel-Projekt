<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;


class UserService
{

    public function getUserById($id){

        return User::findOrFail($id);
    }

    public function edit(Request $request,$id)
    {
        $credentials = $request->validate([
            "username" => ["required","unique:users,username," . $id,"min:4","max:45","regex:/^[a-zA-Z0-9_]+$/"],
            "email" => ["required","email","unique:users,email," . $id],
            "phone_number" => ["nullable","min:9","max:15"],
            "avatar_url" => ['nullable','image']
        ]);

        $model = User::findOrFail($id);

        Gate::authorize("update",$model);

        if($request->hasFile("avatar_url")) {

            if ($model->avatar_url) {
                Storage::disk("public")->delete($model->avatar_url);
            }

            $credentials["avatar_url"] = $request->file("avatar_url")->store("uploads/avatars", "public");
        }

        $model->update($credentials);
    }

    public function changePassword(Request $request, $id)
    {

        $credentials = $request->validate([
            "oldPassword" => ["required"],
            "newPassword" => ["required","min:8","regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"],
            "newPasswordRepeat" => ["required","same:newPassword"],
        ]);

        $model = User::findOrFail($id);

        Gate::authorize('update',$model);

        if(!Hash::check($request->input("oldPassword"),$model->password)){
            throw ValidationException::withMessages([
               "oldPassword" => "Stare hasło jest niepoprawne"
            ]);
        }

        $model->update([
            "password" => $request->input("newPassword")
        ]);
    }

    public function deactivate($id){

        $model = User::findOrFail($id);

        Gate::authorize("update",$model);

        $model->is_active = false;
        $model->listings()->update([
           "is_active" => false
        ]);
        $model->save();

        Auth::logout();
    }


}
