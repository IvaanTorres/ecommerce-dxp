<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

// The gender of the user
class Gender extends Model
{
    use HasFactory;

    public function users(): HasMany {
        return $this->hasMany(User::class, 'gender_id');
    }
}
