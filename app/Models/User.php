<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['role_id', 'name', 'email', 'city'];

    protected $casts = [
        'role_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'city' => 'string',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }
    protected function city(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),

        );
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
