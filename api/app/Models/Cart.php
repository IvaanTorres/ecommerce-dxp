<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The shopping cart, which may contain a bunch of packs ready to be ordered
class Cart extends Model
{
    use HasFactory;

    /* 1-1 */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* 1-M */
    public function packs(): HasMany {
        return $this->hasMany(Pack::class, 'cart_id');
    }
    
}
