<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'id_kategori',
        'id_toko',
        'id_user',        // ← WAJIB TAMBAH INI
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'tanggal_upload'
    ];

    public function gambars()
    {
        return $this->hasMany(GambarProduct::class, 'id_produk', 'id_produk');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id_toko');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    
}
