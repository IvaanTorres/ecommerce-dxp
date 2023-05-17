<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// The product
class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /* 1-M */
    public function images(): HasMany {
        return $this->hasMany(Image::class, 'product_id');
    }

    /* M-M */
    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    /* M-1 */
    // public function brand(): BelongsTo {
    //     return $this->belongsTo(Brand::class, 'brand_id');
    // }

    /* M-1 */
    public function discount(): BelongsTo {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    /* M-1 */
    public function star(): BelongsTo {
        return $this->belongsTo(Star::class, 'nb_stars_id');
    }

    /* 1-M */
    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'product_id');
    }

    /* M-1 */
    public function pack(): HasOne {
        return $this->hasOne(Pack::class, 'product_id');
    }

    /* M-M */
    public function whishlists(): BelongsToMany {
        return $this->belongsToMany(Whishlist::class, 'whishlist_product', 'product_id', 'whishlist_id');
    }

}
