<?php

namespace App\Http\Controllers;

class Helper
{
    static public function getRoomTypeRu($type_eng) {
        switch ($type_eng) {
            case "in_home":
                $room = 'Дом';
                break;
            case "in_hall":
                $room = 'Зал';
                break;
        }
        return $room;
    }

    static public function getExperienceTypeRu($type_eng) {
        switch ($type_eng) {
            case "beginner":
                $experience = 'Новичок';
                break;
            case "experienced":
                $experience = 'Опытный';
                break;
            case "pro":
                $experience = 'Профи';
                break;
            case "super_pro":
                $experience = 'Суперпрофи';
                break;
        }
        return $experience;
    }
}
