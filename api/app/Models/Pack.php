<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The pack, which may contain a bunch of products
class Pack extends Model
{
    use HasFactory;

    /* M-M */
    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class, 'order_pack', 'pack_id', 'order_id');
    }
    
    /* M-1 */
    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    
    /* 1-1 */
    public function product(): BelongsTo { /* Type of product */
        return $this->belongsTo(Product::class, 'product_id');
    }
}
