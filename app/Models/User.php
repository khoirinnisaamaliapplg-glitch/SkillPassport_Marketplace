<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user'; // primary key custom
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'kontak',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];


    public function toko()
    {
        // Satu user memiliki satu toko
        return $this->hasOne(Toko::class, 'id_user', 'id_user');
    }

}
