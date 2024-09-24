<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'price',
        'image',
    ];
}
