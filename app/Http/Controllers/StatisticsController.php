<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objective;
class StatisticsController extends Controller
{
  public function createGrafic()
    {
        // Получаем все параметры из модели Objective
        $nameObjOptions = Objective::all();

        // Передаем параметры в представление
        return view('auth.dashboard', ['nameObjOptions' => $nameObjOptions]);
    }
}
