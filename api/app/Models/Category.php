<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The category, which may container a bunch of products, discounts and images
// It may be attached to a bunch of products
class Category extends Model
{
    use HasFactory;

    /* M-M */
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }

    /* M-M */
    public function images(): BelongsToMany {
        return $this->belongsToMany(Image::class, 'image_category', 'category_id', 'image_id');
    }

    /* M-1 */
    public function discount(): BelongsTo {
        return $this->belongsTo(Discount::class, 'discount_id');
    }
    
    /* M-1 */
    public function brands(): BelongsTo {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
