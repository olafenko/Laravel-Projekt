<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Listing extends Model
{

    public function author(): BelongsTo{
        return $this->belongsTo(User::class,"author_id");
    }

    public function category(): BelongsTo{
        return $this->BelongsTo(Category::class);
    }

}
