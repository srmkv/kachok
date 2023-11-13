<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'price',
        'hint',
        'status_1',
        'status_2',
        'status_3',
        'status_4',
        'status_5',
        'status_6',
        'status_7',
        'status_8',
        'status_9',
        'status_10',
        'sort',
    ];
}
