<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Donation;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'target_amount',
        'current_amount',
        'deadline',
        'image',
        'status',
        'suggestions'  // Pastikan field ini ada
    ];

    protected $casts = [
        'deadline' => 'date',
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2'
    ];

    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount == 0) {
            return 0;
        }
        return ($this->current_amount / $this->target_amount) * 100;
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}