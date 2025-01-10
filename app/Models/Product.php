<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'category',
        'price',
        'stock',
        'status',
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    
}
