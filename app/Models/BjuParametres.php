<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BjuParametres extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal',
        'weight_now',
        'height',
        'age',
        'gender',
        'activity',
        'desired_weight',
    ];

}
