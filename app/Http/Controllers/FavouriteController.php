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


}
