<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'category',
        'volunteer_name',
        'location',
        'description',
        'image',
    ];
}
