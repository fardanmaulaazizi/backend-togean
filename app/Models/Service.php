<?php

namespace App\Models;

use App\Models\Boat;
use App\Models\Room;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    public function product (): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function boat(): HasOne{
        return $this->hasOne(Boat::class);
    }

    public function room(): HasMany{
        return $this->hasMany(Room::class);
    }
}
