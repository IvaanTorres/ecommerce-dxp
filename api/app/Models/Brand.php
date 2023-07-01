<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The brand, which may container a bunch of products, discounts and images
class Brand extends Model
{
    use HasFactory;

    public function images(): HasMany {
        return $this->hasMany(Image::class, 'brand_id');
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function discount(): BelongsTo {
        return $this->belongsTo(Discount::class, 'discount_id');
    }
}
