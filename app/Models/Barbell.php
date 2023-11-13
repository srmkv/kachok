<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Barbell extends Model
{
    use HasFactory;

    protected $table = 'barbell';

    protected $fillable = [
        'kg',
        'active',
        'sort',
        'type',
    ];

    protected $visible = ['kg', 'type'];

    public function getStatusAttribute() {
        if($this->active) {
            return 'Отображается';
        }
        return 'Скрыт';
    }

    public function getTypesAttribute() {
        if($this->type === 1) {
            return 'Блин';
        }
        if($this->type === 2) {
            return 'Гриф';
        }
        return $this->type;
    }
}
