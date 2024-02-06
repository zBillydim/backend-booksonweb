<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Clients extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'clients';
    protected $fillable = ['username', 'email', 'password', 'status'];
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'CREATED_AT' => 'datetime:Y-m-d H:i:s',
        'UPDATED_AT' => 'datetime:Y-m-d H:i:s',
        'DELETED_AT' => 'datetime:Y-m-d H:i:s',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
