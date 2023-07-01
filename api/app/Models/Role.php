<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// The role of the user (ADMIN, USER, etc.)
class Role extends Model
{
    use HasFactory;

    public function users(): HasMany {
        return $this->hasMany(User::class, 'role_id');
    }
}
