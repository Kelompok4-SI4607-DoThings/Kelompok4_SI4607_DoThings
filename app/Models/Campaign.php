<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'current_amount',
        'deadline',
        'image'
    ];

    protected $casts = [
        'deadline' => 'date',
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2'
    ];

    public function getProgressPercentageAttribute()
    {
        // Cek apakah target_amount adalah nol
        if ($this->target_amount == 0) {
            return 0; // Jika nol, kembalikan 0 untuk menghindari pembagian dengan nol
        }

        return ($this->current_amount / $this->target_amount) * 100;
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}