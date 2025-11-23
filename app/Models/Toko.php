<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko'; // nama tabel
    protected $primaryKey = 'id_toko'; // primary key yang benar
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'nama_toko',
        'deskripsi',
        'alamat',
        'kontak_toko',
        'gambar',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function produks()
    {
        return $this->hasMany(Product::class, 'id_toko', 'id_toko');
    }

}
