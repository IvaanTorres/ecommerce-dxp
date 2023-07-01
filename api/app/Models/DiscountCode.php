<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiscountCode extends Model
{
    use HasFactory;

    public function carts(): HasMany {
        return $this->hasMany(Cart::class);
    }

    // public function discount(): BelongsTo {
    //     return $this->belongsTo(Discount::class);
    // }
}
