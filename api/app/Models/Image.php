<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// The image, which may be attached to products, categories and brands
class Image extends Model
{
    use HasFactory;

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'image_category', 'image_id', 'category_id');
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
