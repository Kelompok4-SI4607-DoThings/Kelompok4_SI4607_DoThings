<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'komunitas_admin_id',
        'user_id',
        'message',
    ];

    public function komunitasAdmin()
    {
        return $this->belongsTo(KomunitasAdmin::class, 'komunitas_admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}