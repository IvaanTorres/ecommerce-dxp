<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// The user
class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /* 1-M */
    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'user_id');
    }

    /* 1-1 */
    public function cart(): HasOne {
        return $this->hasOne(Cart::class, 'user_id');
    }

    /* 1-M */
    public function orders(): HasMany {
        return $this->hasMany(Order::class, 'user_id');
    }

    /* 1-1 */
    public function whishlist(): HasOne {
        return $this->hasOne(Whishlist::class, 'user_id');
    }

    /* 1-1 */
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // 1-1
    public function gender(): BelongsTo {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
