<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_id',
        'name',
    ];

    public function dishes()
    {
        return $this->hasMany(UserDish::class);
    }

}
