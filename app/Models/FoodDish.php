<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDish extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_food_id',
        'dish_id',
        'count'
    ];

    public function DayFood()
    {
        return $this->hasOne(DayFood::class, 'id', 'day_food_id');
    }

    public function dish(): BelongsTo
    {
        return $this->BelongsTo(Dish::class);
    }
}
