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
        'email',
        'password',
    ];

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function cart(): HasOne {
        return $this->hasOne(Cart::class, 'user_id');
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function wishlist(): HasOne {
        return $this->hasOne(Wishlist::class, 'user_id');
    }

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function gender(): BelongsTo {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
