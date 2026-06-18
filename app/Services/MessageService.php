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

}
