<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['role_id', 'name', 'email', 'city'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
