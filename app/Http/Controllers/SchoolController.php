<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
class SchoolController extends Controller
{
  public function school()
    {
        // Получаем все параметры из модели Objective
        $schools = School::all();

        // Передаем параметры в представление
        return view('school.index', compact('schools'));
    }
}
