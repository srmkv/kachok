<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
class DocumentsController extends Controller
{
  public function documents()
    {
        // Получаем все параметры из модели Objective
        $documents = Documents::all();

        // Передаем параметры в представление
        return view('documents.index', compact('documents'));
    }
}
