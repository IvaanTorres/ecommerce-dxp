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

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function product(): BelongsTo { /* Type of product */
        return $this->belongsTo(Product::class, 'product_id');
    }
}
