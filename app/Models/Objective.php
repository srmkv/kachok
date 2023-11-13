<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;
     protected $fillable = ['name_obj'];
      public function statistics()
    {
        return $this->hasMany(Statistics::class, 'name', 'name_obj');
    }
}
