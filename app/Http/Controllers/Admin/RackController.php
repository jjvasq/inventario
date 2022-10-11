<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $racks = Rack::all();
        return view('admin.racks.index', compact('racks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.racks.create');
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
            'slug' => 'required|unique:racks',
            'descripcion' => 'required',
            'fecha_limpieza' => 'required',
        ]);
        $rack = Rack::create($request->all());
        return redirect()->route('admin.racks.edit', $rack)->with('info', 'El rack se ingresó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rack $rack)
    {
        return view('admin.racks.show', compact('rack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rack $rack)
    {
        return view('admin.racks.edit', compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rack $rack)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:racks,slug,$rack->id",
            'descripcion' => 'required',
            'fecha_limpieza' => 'required',
        ]);
        $rack->update($request->all());

        return redirect()->route('admin.racks.edit', $rack)->with('info', 'El rack se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rack $rack)
    {
        $rack->delete();

        return redirect()->route('admin.racks.index')->with('eliminar', 'ok');
    }
}
