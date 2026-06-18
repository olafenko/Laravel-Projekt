<?php

namespace App\Http\Controllers;

use App\Services\ListingService;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    private MessageService $messageService;
    private ListingService $listingService;

    public function __construct(MessageService $messageService, ListingService $listingService)
    {
        $this->messageService = $messageService;
        $this->listingService = $listingService;
    }


    public function index($id){

        $models = $this->messageService->getAllMessages($id);
        return view("message.index",["models"=>$models,"messageCount" => $models->count(),"page_title" => "Wszystkie wiadomości"]);
    }

    public function details($id){

        $model = $this->messageService->getMessageDetails($id);
        return view("message.details",["model"=>$model,"page_title" => "Podgląd wiadomości"]);
    }

    public function sendFromView($id){
        $model = $this->listingService->getListingById($id);
        return view("message.sendForm",["model" => $model,"page_title" => "Tworzenie wiadomości"]);
    }

    public function sendMessage(Request $request,$id){

        $this->messageService->send($request,$id);
        return redirect('/');
    }

    public function replyFormView($id){
        $model = $this->messageService->getMessageById($id);

        return view("message.replyForm",["model" => $model,"page_title" => "Odpowiedz"]);
    }




}
