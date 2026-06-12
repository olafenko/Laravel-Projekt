<?php

namespace App\Services;

use App\Models\Listing;
use Illuminate\Support\Collection;

class ListingService
{

    public function getAllListings() : Collection{
        return Listing::all();
    }


}
