<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The order, which may contain a bunch of packs already ordered
class Order extends Model
{
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function packs(): HasMany {
        return $this->hasMany(Pack::class, 'order_id');
    }
}
