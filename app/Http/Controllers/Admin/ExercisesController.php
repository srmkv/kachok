<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercises;
use Illuminate\Http\Request;
use App\Exports\ExportExercises;
use App\Imports\ImportExercises;
use App\Models\Apparatus;
use Maatwebsite\Excel\Facades\Excel;

class ExercisesController extends Controller
{
    // public function tempAddApps() {
    //     $exercises = Exercises::get();
    //     foreach($exercises as $exercise) {
    //         $app = Apparatus::where('name', $exercise->apparatus)->select('id')->first();
    //         $exercise->apparatus_id = $app->id;
    //         $exercise->save();
    //     }
        
    // }
    public function index(){
        // $this->tempAddApps();
        $exercises = Exercises::OrderBy('id', 'desc')->paginate(10);
        return view('admin.exercises.index', compact('exercises'));
    }

    public function create(){
        return view('admin.exercises.create');
    }

    public function import_page(){
        return view('admin.exercises.import');
    }

    public function export()
    {
        return Excel::download(new ExportExercises, 'exercises.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function import()
    {
        request()->validate([
            'file' => 'required',
        ]);

        Excel::import(new ImportExercises, request()->file('file'));

        return redirect()->route('exercises.index')
            ->with('success', 'Успешно создан.');
    }

    public function edit($id){
        $exercise = Exercises::with('apparatus')->findOrFail($id);
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function store(Request $request){

        request()->validate([
            'name' => 'required',
            'type' => 'required',
            'experience' => 'required',
            // 'description' => 'required', 
            'type_train' => 'required',
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

        Exercises::create($input);

        return redirect()->route('exercises.index')
            ->with('success', 'Успешно создан.');
    }

    public function update(Request $request,$id){
        $exercise = Exercises::findOrFail($id);

        request()->validate([
            'name' => 'required',
            'type' => 'required',
            'experience' => 'required',
            // 'description' => 'required', 
            'type_train' => 'required',
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

        $exercise->update($input);

        return redirect()->route('exercises.index')
            ->with('success', 'Успешно изменен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercises $exercise)
    {
        $exercise->delete();
        return redirect()->route('exercises.index')
            ->with('success','Упражнение успешно удалено.');
    }
}
