<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MessagePolicy
{

    public function view(User $user, Message $message): bool
    {
        return $user->id === $message->receiver_id || $user->id === $message->sender_id ;
    }

}
