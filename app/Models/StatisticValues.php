<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticValues extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'value',
        'date',

    ];
}
