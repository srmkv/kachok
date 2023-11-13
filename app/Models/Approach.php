<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approach extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_training_id',
        'kg',
        'repeat'
    ];

    public function PeriodTraining(){
        return $this->belongsTo(PeriodTraining::class);
        }
}
