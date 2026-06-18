<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    public function sender(): BelongsTo{
        return $this->belongsTo(User::class,"sender_id");
    }

    public function receiver(): BelongsTo{
        return $this->belongsTo(User::class,"receiver_id");
    }

    public function listing(): BelongsTo{
        return $this->belongsTo(Listing::class,"listing_id");
    }
}
