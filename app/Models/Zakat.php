<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $table = 'zakat';

    protected $fillable = [
        'nama_pembayar_zakat',
        'penghasilan_perbulan',
        'bonus',
        'utang',
        'pantiasuhan',
        'status',
        'is_paid',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
