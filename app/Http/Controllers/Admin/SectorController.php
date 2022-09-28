<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = Sector::all();
        return view('admin.sectores.index', compact('sectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sectores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:sectores',
            'descripcion' => 'required',
        ]);
        $sectore = Sector::create($request->all());

        return redirect()->route('admin.sectores.edit', $sectore)->with('info', 'El sector se ingresó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sectore)
    {
        return view('admin.sectores.show', compact('sectore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sectore)
    {
        return view('admin.sectores.edit', compact('sectore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sectore)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:sectores,slug,$sectore->id",
            'descripcion' => 'required',
        ]);

        $sectore->update($request->all());
        
        return redirect()->route('admin.sectores.edit', $sectore)->with('info', 'El Sector se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sectore)
    {
        $sectore->delete();

        return redirect()->route('admin.sectores.index')->with('info', 'El Sector se eliminó con éxito.');
    }
}
