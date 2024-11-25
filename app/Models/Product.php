<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function service(): HasMany{
        return $this->hasMany(Service::class);
    }
}
