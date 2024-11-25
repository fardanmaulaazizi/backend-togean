<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public function room(): BelongsTo{
        return $this->belongsTo(Room::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
