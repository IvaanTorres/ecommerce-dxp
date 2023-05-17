<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The whishlist of a user, which may contain a bunch of products
class Whishlist extends Model
{
    use HasFactory;

    /* 1-1 */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* M-M */
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'whishlist_product', 'whishlist_id', 'product_id');
    }
}
