<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class User extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];

    // Relación con el cliente (un usuario puede tener un cliente asociado)
    public function client()
    {
        return $this->hasOne(Client::class); // Relación uno a uno con el modelo Client
    }
}

