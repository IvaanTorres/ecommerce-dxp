<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The discount of a product, a category, a brand or a discount code
class Discount extends Model
{
    use HasFactory;
    // TODO: Add start_date and end_date
    // TODO: Add max number of uses

    public function products(): HasMany {
        return $this->hasMany(Product::class, 'discount_id');
    }

    public function categories(): HasMany {
        return $this->hasMany(Category::class, 'discount_id');
    }

    public function brands(): HasMany {
        return $this->hasMany(Brand::class, 'discount_id');
    }
}
