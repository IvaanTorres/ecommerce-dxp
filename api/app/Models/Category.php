<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The category, which may container a bunch of products, discounts and images
// It may be attached to a bunch of products
class Category extends Model
{
    use HasFactory;

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }

    public function images(): BelongsToMany {
        return $this->belongsToMany(Image::class, 'image_category', 'category_id', 'image_id');
    }

    public function discount(): BelongsTo {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children(): HasMany {
        return $this->hasMany(Category::class, 'category_id')->with('children');
    }
}
