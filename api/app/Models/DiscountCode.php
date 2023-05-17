<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// The discount code is the code that the user can use to get a discount on the cart price
class DiscountCode extends Model
{
    use HasFactory;

    /* 1-1 */
    // public function discount(): BelongsTo {
    //     return $this->belongsTo(Discount::class, 'discount_id');
    // }

    // TODO: Check if it is one to one or one to many
    public function discounts(){
        return $this->morphToMany(Discount::class, 'discountable');
    }
}
