<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'gender',
        'goal',
        'number_of_workouts_per_week',
        'day',
        'train_type',
        'experience',
        'apparatus',
        'apparatus_comment'
    ];
}

