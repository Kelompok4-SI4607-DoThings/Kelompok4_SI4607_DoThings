<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Menambahkan kolom role
    ];

    // Kolom yang harus disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Menambahkan cast untuk password yang di-hash
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Menandakan bahwa password disimpan dengan hashing
    ];

    public function zakats()
    {
        return $this->hasMany(Zakat::class);
    }
}
