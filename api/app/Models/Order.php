<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The order, which may contain a bunch of packs already ordered
class Order extends Model
{
    use HasFactory;

    /* M-1 */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* M-M */
    public function packs(): BelongsToMany {
        return $this->belongsToMany(Packs::class, 'order_pack', 'order_id', 'pack_id');
    }
}
