<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::OrderBy('sort', 'asc')->paginate(10);
        return view('admin.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'education' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

         $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";
        }

        Trainer::create($input);


        return redirect()->route('trainers.index')
            ->with('success','Тренер успешно создан.');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        return view('admin.trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
         request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'education' => 'required',
        ]);

         $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";
        }else {
            unset($input['photo']);
        }

        $trainer->update($input);


        return redirect()->route('trainers.index')
            ->with('success','Тренер успешно изменен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('trainers.index')
            ->with('success','Тренер успешно удален.');
    }

    public function up($id)
    {
        $objUp = Trainer::findOrFail($id);
        $objUp->decrement('sort');
        $objUp->save();

        $objDown = Trainer::where('sort', $objUp->sort)->first();
        $objDown->increment('sort');
        $objDown->save();

        return redirect()->route('trainers.index')
            ->with('success','Тренер успешно изменен.');
    }

    public function down($id)
    {
        $objDown = Trainer::findOrFail($id);
        $objDown->increment('sort');
        $objDown->save();

        $objUp = Trainer::where('sort', $objDown->sort)->first();
        $objUp->decrement('sort');
        $objUp->save();

        return redirect()->route('trainers.index')
            ->with('success','Тренер успешно изменен.');
    }

}
