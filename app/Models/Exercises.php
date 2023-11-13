<?php

namespace App\Models;

use App\Models\Apparatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercises extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'type_train',
        'apparatus_id',
        'experience',
        'room',
        'photo',
        'description',
        'trigger'
    ];

    public function apparatus(): BelongsTo
    {
        return $this->belongsTo(Apparatus::class);
    }
}
