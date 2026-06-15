<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        return ($user->id === $listing->author_id) || $user->is_admin;
    }

    public function addAsFavourite(User $user, Listing $listing): bool
    {
        return $user->id !== $listing->author_id;
    }
}
