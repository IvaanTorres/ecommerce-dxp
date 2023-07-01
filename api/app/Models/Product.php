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

    private function calculateFinalPrice($price, $percentDiscount): float {
        return number_format($price - ($price * $percentDiscount) / 100, 2, '.', ' ');
    }

    public function getFinalPrice(): float {
        // 1 level: Product discount
        // 2 level: Get the category discount with the highest value
        // 3 level: If there is no discount in any category or subcategory, get the discount of the brand
        // 4 level: If there is no discount in brand, the final price is the price of the product
        
        // 1 level
        if ($this->discount) {
            return $this->calculateFinalPrice($this->price, $this->discount->percent);
        } else {
            // 2 level
            $highestCategoryDiscount = $this->categories->max('discount.percent');

            if($highestCategoryDiscount){
                return $this->calculateFinalPrice($this->price, $highestCategoryDiscount);
            } else {
                // 3 level
                $brand = $this->getBrand();
                if ($brand->discount) {
                    return $this->calculateFinalPrice($this->price, $brand->discount->percent);
                } else {
                    // 4 level
                    return number_format($this->price, 2, '.', ' ');
                }
            }
        }
    }

    public function getBrand() {
        return $this->categories->first()->brand;
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    // public function brand(): BelongsTo {
    //     return $this->belongsTo(Brand::class, 'brand_id');
    // }

    public function discount(): BelongsTo {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    // public function star(): BelongsTo {
    //     return $this->belongsTo(Star::class, 'nb_stars_id');
    // }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function pack(): HasOne {
        return $this->hasOne(Pack::class, 'product_id');
    }

    public function wishlists(): BelongsToMany {
        return $this->belongsToMany(Wishlist::class, 'wishlist_product', 'product_id', 'wishlist_id');
    }

}
