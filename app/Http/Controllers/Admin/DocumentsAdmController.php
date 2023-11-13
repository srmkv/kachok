<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsAdmController extends Controller
{
     public function documents(){
        // $this->tempAddApps();
        $documents = Documents::OrderBy('id', 'desc')->paginate(10);
        return view('admin.documents.documents', compact('documents'));
    }

    public function create(){
        return view('admin.documents.create');
    }


    public function edit($id){
        $document = Documents::findOrFail($id);
        return view('admin.documents.edit', compact('document'));
    }

    public function store(Request $request){

        request()->validate([
            'doc_name' => 'required',
            'doc_opisanie' => 'required',
            'path' => 'required',
           
        ]);

        $input = $request->all();

        if ($image = $request->file('path')) {
            $destinationPath = 'doc/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['path'] = "$postImage";
        }else {
            unset($input['path']);
        }

        Documents::create($input);

        return redirect()->route('documents.documents')
            ->with('success', 'Успешно создан.');
    }

    public function update(Request $request,$id){
        $documents = Documents::findOrFail($id);

        request()->validate([
            'doc_name' => 'required',
            'doc_opisanie' => 'required',
            'path' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('path')) {
            $destinationPath = 'doc/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['path'] = "$postImage";
        }else {
            unset($input['path']);
        }

        $documents->update($input);

        return redirect()->route('documents.documents')
            ->with('success', 'Успешно изменен.');
    }

    /**
     * Remove the specified resource from documents.
     */
    public function destroy(Documents $documents)
    {
        $documents->delete();
        return redirect()->route('documents.documents')
            ->with('success','Упражнение успешно удалено.');
    }
}
