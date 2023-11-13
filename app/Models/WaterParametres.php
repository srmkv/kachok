<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterParametres extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'height',
        'gender',
        'active_time',
    ];
}
