<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Tarif;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $trainers = Trainer::OrderBy('sort', 'asc')->get();
        $comments = Comment::OrderBy('sort', 'asc')->get();
        $tarifs = Tarif::OrderBy('sort', 'asc')->get();

        return view('welcome', compact('trainers', 'comments', 'tarifs'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'message'       => 'required',
        ]);
        Contact::create($request->all());

        return response()->json(['success'=>'Спасибо за ваше сообщение! Оно успешно отправлено.']);
    }

    public function commentStore(Request $request)
    {
        Comment::create($request->all());

        return redirect()->route('home')
            ->with('success', 'Спасибо за ваше сообщение! Оно успешно отправлено.');
    }


}
