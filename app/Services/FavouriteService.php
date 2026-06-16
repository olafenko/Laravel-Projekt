<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class FavouriteService
{

    public function favouriteToggle($id){

        $user = Auth::user();
        $user->favourites()->toggle($id);

    }

}
