<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

// The gender of the user
class Gender extends Model
{
    use HasFactory;

    // 1-1
    public function user(): HasOne {
        return $this->hasOne(User::class, 'gender_id');
    }
}
