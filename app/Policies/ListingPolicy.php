<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{

    public function update(User $user, Listing $listing): bool
    {
        return ($user->id === $listing->author_id) || $user->is_admin;
    }

    public function guestActions(User $user, Listing $listing): bool
    {
        return $user->id !== $listing->author_id;
    }


}
