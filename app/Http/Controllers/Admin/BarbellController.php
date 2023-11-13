<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barbell;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarbellController extends Controller
{
    public function index(){
        $barbell = Barbell::OrderBy('sort', 'asc')->paginate(10);
        return view('admin.barbell.index', compact('barbell'));
    }

    public function create(){
        return view('admin.barbell.create');
    }

    public function edit($id){
        $barbell = Barbell::findOrFail($id);
        return view('admin.barbell.edit', compact('barbell'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kg' => 'required'
        ]);
        $input = $request->all();
        Barbell::create($input);

        return redirect()->route('barbell.index')
            ->with('success','Инвентарь успешно создан.');
    }

    public function update(Request $request,$id) {
        $barbell = Barbell::findOrFail($id);
        request()->validate([
            'kg' => 'required'
        ]);
        $input = $request->all();

        if(!isset($input['active'])) $input['active'] = false;

        $barbell->update($input);

        return redirect()->route('barbell.index')
            ->with('success', 'Успешно изменен.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barbell $barbell)
    {
        $barbell->delete();
        return redirect()->route('barbell.index')
            ->with('success','Инвентарь успешно удален.');
    }

    public function up($id)
    {
        $objUp = Barbell::findOrFail($id);
        $objUp->decrement('sort');
        $objUp->save();

        $objDown = Barbell::where('sort', $objUp->sort)->first();
        $objDown->increment('sort');
        $objDown->save();

        return redirect()->route('barbell.index')
            ->with('success','Тренер успешно изменен.');
    }

    public function down($id)
    {
        $objDown = Barbell::findOrFail($id);
        $objDown->increment('sort');
        $objDown->save();

        $objUp = Barbell::where('sort', $objDown->sort)->first();
        $objUp->decrement('sort');
        $objUp->save();

        return redirect()->route('barbell.index')
            ->with('success','Тренер успешно изменен.');
    }
}
