<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'energy',
        'photo',
        'steps',
        'method_preparation',
        'cooking_time'
    ];

    protected $casts = [
        'steps' => 'array',
    ];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'dish_ingredient', 'dish_id', 'ingredient_id')
            ->withPivot("information", "quantity");
    }
}
