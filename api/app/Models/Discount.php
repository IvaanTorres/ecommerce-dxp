<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The discount of a product, a category, a brand or a discount code
class Discount extends Model
{
    use HasFactory;

    /* 1-M */
    public function products(): HasMany {
        return $this->hasMany(Product::class, 'discount_id');
    }

    /* 1-M */
    public function categories(): HasMany {
        return $this->hasMany(Category::class, 'discount_id');
    }
    
    // TODO: Add the categories relationship
    /* 1-M */
    public function brands(): HasMany {
        return $this->hasMany(Brand::class, 'discount_id');
    }

    /* 1-M */
    // public function discountCodes(): HasMany {
    //     return $this->hasMany(DiscountCode::class, 'discount_id');
    // }

    /* It offers a kind of inheritance for the types of uploads the user can upload */
    // TODO: Check if it is one to one or one to many
    public function codes(){
        return $this->morphedByMany(DiscountCode::class, 'discountable');
    }
}
