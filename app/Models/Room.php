<?php

namespace App\Models;

use App\Models\Boat;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    public function service(): BelongsTo{
        return $this->belongsTo(Service::class);
    }
    public function boat(): BelongsTo{
        return $this->belongsTo(Boat::class);
    }
    public function order(): HasMany{
        return $this->hasMany(Order::class);
    }
}
