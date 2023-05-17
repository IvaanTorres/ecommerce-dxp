<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// The role of the user (ADMIN, USER, etc.)
class Role extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class, 'role_id');
    }
}
