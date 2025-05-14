<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'user_id',
        'image_path',
        'category'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}