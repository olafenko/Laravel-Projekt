<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    private MessageService $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index($id){

        $models = $this->messageService->getAllMessages($id);
        return view("message.index",["models"=>$models,"messageCount" => $models->count(),"page_title" => "Wszystkie wiadomości"]);
    }
}
