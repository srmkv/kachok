<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
     public function index(){
        // $this->tempAddApps();
        $documents = Exercises::OrderBy('id', 'desc')->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create(){
        return view('admin.documents.create');
    }


    public function edit($id){
        $document = Documents::with('apparatus')->findOrFail($id);
        return view('admin.documents.edit', compact('document'));
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
