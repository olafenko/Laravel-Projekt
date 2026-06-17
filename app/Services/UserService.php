<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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


}
