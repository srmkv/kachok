<?php

namespace Database\Seeders;

use App\Models\Tarif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarif::create([
            'name' => 'Free',
            'price' => 0,
            'hint' => 'Ознакомительный тариф, действует только 1 день',
            'status_1' => '✔',
            'status_2' => '✔',
            'status_3' => '•',
            'status_4' => '•',
            'status_5' => '•',
            'status_6' => '•',
            'status_7' => '•',
            'status_8' => '•',
            'status_9' => '•',
            'status_10' => '•',
            'sort' => 1,
        ]);

        Tarif::create([
            'name' => 'Standart',
            'price' => 20,
            'hint' => 'Упражнения формируются автоматически',
            'status_1' => '✔',
            'status_2' => '✔',
            'status_3' => '✔',
            'status_4' => '•',
            'status_5' => '•',
            'status_6' => '•',
            'status_7' => '•',
            'status_8' => '•',
            'status_9' => '•',
            'status_10' => '•',
            'sort' => 2,
        ]);

        Tarif::create([
            'name' => 'Standart+',
            'price' => 40,
            'hint' => 'Тоже что и Standard, заполняется сразу вся ближайшая неделя',
            'status_1' => '✔',
            'status_2' => '✔',
            'status_3' => '✔',
            'status_4' => '✔',
            'status_5' => '•',
            'status_6' => '•',
            'status_7' => '1',
            'status_8' => '•',
            'status_9' => '•',
            'status_10' => '•',
            'sort' => 3,
        ]);

        Tarif::create([
            'name' => 'Standart+',
            'price' => 60,
            'hint' => 'Тоже что и Standard+ + план питания (без выбора рациона)',
            'status_1' => '✔',
            'status_2' => '✔',
            'status_3' => '✔',
            'status_4' => '✔',
            'status_5' => '✔',
            'status_6' => '•',
            'status_7' => '2',
            'status_8' => '•',
            'status_9' => '•',
            'status_10' => '•',
            'sort' => 4,
        ]);

        Tarif::create([
            'name' => 'Premium',
            'price' => 100,
            'hint' => 'Комплекс занятий для зала и дома(с учетом травм) + план питания (c выбором рациона)',
            'status_1' => '✔',
            'status_2' => '✔',
            'status_3' => '✔',
            'status_4' => '✔',
            'status_5' => '✔',
            'status_6' => '✔',
            'status_7' => '8',
            'status_8' => '•',
            'status_9' => '•',
            'status_10' => '•',
            'sort' => 5,
        ]);

        Tarif::create([
            'name' => 'Premium+',
            'price' => 140,
            'hint' => 'Весь Premium + возможность онлайн общения с тренером или диетологом (до 3 консультаций в неделю)',
            'status_1' => '✔',
            'status_2' => '✔',
            'status_3' => '✔',
            'status_4' => '✔',
            'status_5' => '✔',
            'status_6' => '✔',
            'status_7' => 'все',
            'status_8' => '✔',
            'status_9' => '✔',
            'status_10' => '✔',
            'sort' => 6,
        ]);

    }
}
