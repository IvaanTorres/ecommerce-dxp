<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// The review of a product
class Review extends Model
{
    use HasFactory;

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // public function star(): BelongsTo {
    //     return $this->belongsTo(Star::class, 'nb_stars_id');
    // }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
