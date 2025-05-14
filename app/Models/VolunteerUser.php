<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerUser extends Model
{
    use HasFactory;

    // Jika nama tabel bukan jamak dari nama model, tambahkan ini:
    // protected $table = 'nama_tabel';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'motivasi',
    ];
}
