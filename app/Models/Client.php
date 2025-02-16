<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address'];

    // Relación inversa con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class); // Relación de cliente a usuario
    }

    // Relación con las facturas (un cliente tiene muchas facturas)
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

