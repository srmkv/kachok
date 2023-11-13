<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apparatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApparatusController extends Controller
{
    public function index(){
        $apparatus = Apparatus::OrderBy('id', 'desc')->paginate(10);
        return view('admin.apparatus.index', compact('apparatus'));
    }

    public function create(){
        return view('admin.apparatus.create');
    }

    public function edit($id){
        $apparatus = Apparatus::findOrFail($id);
        return view('admin.apparatus.edit', compact('apparatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         request()->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

         $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";
        }

        Apparatus::create($input);

        return redirect()->route('apparatus.index')
            ->with('success','Инвентарь успешно создан.');
    }

    public function update(Request $request,$id) {
        $apparatus = Apparatus::findOrFail($id);

        // request()->validate([
        //     'slug' => 'required'
        // ]);

        $input = $request->all();

        if( !isset($input['hall']) ) {
           $input['hall'] = 0;
        }

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";
        } else {
            unset($input['photo']);
        }

        $apparatus->update($input);

        return redirect()->route('apparatus.index')
            ->with('success', 'Успешно изменен.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apparatus $apparatus)
    {
        $apparatus->delete();
        return redirect()->route('apparatus.index')
            ->with('success','Инвентарь успешно удален.');
    }
}
