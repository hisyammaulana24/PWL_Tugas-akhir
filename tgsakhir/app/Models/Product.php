<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_products',
        'deskripsi_products',
        'harga_products',
        'gambar_products',

    ];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'product_id');
    }
}
