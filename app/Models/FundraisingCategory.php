<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundraisingCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}