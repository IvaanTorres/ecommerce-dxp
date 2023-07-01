<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The wishlist of a user, which may contain a bunch of products
class Wishlist extends Model
{
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'wishlist_product', 'wishlist_id', 'product_id');
    }
}
