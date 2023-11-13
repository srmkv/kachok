<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodTraining extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_day_id',
        'name',
    ];

    public function approaches(){
        return $this->hasMany(Approach::class);
        }

    public function exercise($query){
        $exercise = Exercises::where('name', $query)->first();
        return $exercise;
    }

}
