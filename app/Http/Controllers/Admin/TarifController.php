<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifs = Tarif::OrderBy('sort', 'asc')->paginate(10);
        return view('admin.tarifs.index', compact('tarifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tarifs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric'
            ]
        );

        Tarif::create($request->all());


        return redirect()->route('tarifs.index')
            ->with('success', 'Тариф успешно создан.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarif $tarif)
    {
        return view('admin.tarifs.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarif $tarif)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric'
            ]
        );

        $tarif->update($request->all());


        return redirect()->route('tarifs.index')
            ->with('success', 'Тариф успешно изменен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarif $tarif)
    {
        $tarif->delete();
        return redirect()->route('tarifs.index')
            ->with('success', 'Тариф успешно удален.');
    }

     public function up($id)
    {
        $objUp = Tarif::findOrFail($id);
        $objUp->decrement('sort');
        $objUp->save();

        $objDown = Tarif::where('sort', $objUp->sort)->first();
        $objDown->increment('sort');
        $objDown->save();

        return redirect()->route('tarifs.index')
            ->with('success','Тариф успешно изменен.');
    }

    public function down($id)
    {
        $objDown = Tarif::findOrFail($id);
        $objDown->increment('sort');
        $objDown->save();

        $objUp = Tarif::where('sort', $objDown->sort)->first();
        $objUp->decrement('sort');
        $objUp->save();

        return redirect()->route('tarifs.index')
            ->with('success','Тариф успешно изменен.');
    }
}
