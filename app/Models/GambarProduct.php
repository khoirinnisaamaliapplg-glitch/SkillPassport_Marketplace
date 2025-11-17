<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarProduct extends Model
{
    protected $table = 'gambar_product';
    protected $primaryKey = 'id_gambar';
    protected $fillable = ['id_produk', 'nama_gambar'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }
}
