<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The number of stars of a review (1-5)
class Star extends Model
{
    use HasFactory;

    /* 1-M */
    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'nb_stars_id');
    }

    /* 1-M */
    public function products(): HasMany {
        return $this->hasMany(Product::class, 'nb_stars_id');
    }
}
