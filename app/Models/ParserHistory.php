<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParserHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const IN_PROGRESS = "IN_PROGRESS";
    const FAILED = "FAILED";
    const COMPLETED = "COMPLETED";
}
