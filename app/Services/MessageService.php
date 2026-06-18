<?php

namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;

class MessageService
{

    public function getAllMessages($id) : Collection{

        $user = User::findOrFail($id);

        Gate::authorize("update",$user);

        return Message::with('receiver','sender','listing')->where("receiver_id","=",$user->id)->orderBy("created_at")->get();

    }

    public function getMessageDetails($id){

        $model = Message::with('receiver','sender','listing')->findOrFail($id);

        Gate::authorize("view",$model);

        if(!$model->is_read && $model->receiver_id === auth()->id()){
            $model->is_read = true;
            $model->save();
        }

        return $model;
    }

}
