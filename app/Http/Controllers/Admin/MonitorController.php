<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamiento;
use App\Models\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.monitores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = [
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        $equipamientos = Equipamiento::pluck('descripcion', 'id');

        return view('admin.monitores.create', compact('estados', 'equipamientos'));
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
            'marca' => 'required',
            'tamanio' => 'required',
            'modelo' => 'required',
            'serial' => 'required',
        ]);

        $monitor = Monitor::create($request->all());
        return redirect()->route('admin.monitores.edit', $monitor)->with('info', 'El Monitor se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Monitor $monitore)
    {
        return view('admin.monitores.show', compact('monitore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitor $monitore)
    {
        $estados = [
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        $equipamientos = Equipamiento::pluck('descripcion', 'id');
        return view('admin.monitores.edit', compact('monitore', 'estados', 'equipamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitor $monitore)
    {
        $request->validate([
            'marca' => 'required',
            'tamanio' => 'required',
            'modelo' => 'required',
            'serial' => 'required',
        ]);

        $monitore->update($request->all());

        return redirect()->route('admin.monitores.edit', $monitore)->with('info', 'El Monitor se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitore)
    {
        $monitore->delete();
        return redirect()->route('admin.monitores.index')->with('eliminar', 'ok');
    }
}
