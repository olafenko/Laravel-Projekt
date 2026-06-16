<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class FavouriteService
{

    public function getFavourites() : Collection {
        $user = Auth::user();
        return $user->favourites()->where("is_active","=",true)->get();
    }

    public function favouriteToggle($id): void
    {
        $user = Auth::user();
        $user->favourites()->toggle($id);
    }

}
