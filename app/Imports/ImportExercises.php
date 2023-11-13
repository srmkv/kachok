<?php

namespace App\Imports;

use App\Models\Apparatus;
use App\Models\Exercises;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportExercises implements ToModel, WithHeadingRow
{
    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if( isset($row['name'] ) ) {
            $hall = (isset($row['room']) && $row['room'] == 'Зал')? 1 : 0;
            $apparat = Apparatus::firstOrCreate([
                'name' => $row['apparatus'],
                'hall' => $hall
            ]);
            return new exercises(
                [
                    'name' => $row['name'] ?? 'пусто',
                    'type' => $row['type'] ?? 'пусто',
                    'type_train' => $row['type_train'] ?? 'пусто',
                    'apparatus_id' => $apparat->id ?? 0,
                    'experience' => $row['experience'] ?? 'пусто',
                    'room' => $row['room'] ?? 'пусто',
                    'trigger' => $row['trigger'] ?? 0
                ]
            );
        }
        
    }
}
