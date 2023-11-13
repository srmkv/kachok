<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'water_with_train',
        'water_without_train',
    ];


}
