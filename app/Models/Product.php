<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}

