<?php

namespace App\Http\Controllers;

use App\Services\FavouriteService;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    private FavouriteService $favouriteService;

    public function __construct(FavouriteService $favouriteService)
    {
        $this->favouriteService = $favouriteService;
    }


    public function toggle($id){
        $this->favouriteService->favouriteToggle($id);

        return back();
    }

    public function index(){
        $models = $this->favouriteService->getFavourites();
        return view("favourite.index",["models" => $models,"favCount" => $models->count(),"page_title" => "Ulubione"]);
    }


}
