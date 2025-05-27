<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomunitasAdmin extends Model
{
    use HasFactory;

    protected $table = 'komunitas_admins';

    protected $fillable = [
        'judul_komunitas',
        'tanggal_dibuat',
        'category',
        'deskripsi',
    ];
}
