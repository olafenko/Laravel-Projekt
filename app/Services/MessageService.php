<?php

namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Gate;

class MessageService
{

    private ListingService $listingService;

    public function __construct(ListingService $listingService)
    {
        $this->listingService = $listingService;
    }


    public function getAllMessages($id) : Collection{

        $user = User::findOrFail($id);

        Gate::authorize("update",$user);

        return Message::with('receiver','sender','listing')->where("receiver_id","=",$user->id)->orderBy("is_read")->orderByDesc("created_at")->get();

    }

    public function getMessageById($id){
        return Message::findOrFail($id);
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

    public function send(Request $request, $id)
    {

        $request->validate([
            "message_content" => ["required","max:200"]
        ]);

        $listing = $this->listingService->getListingById($id);
        $model = new Message();

        Gate::authorize("guest-actions",$listing);

        $model->sender_id = auth()->id();
        $model->listing_id = $listing->id;
        $model->receiver_id = $listing->author_id;
        $model->message_content = $request->input("message_content");
        $model->is_read = false;

        $model->save();
    }

}
