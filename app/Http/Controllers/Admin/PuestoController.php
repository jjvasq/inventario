<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conexion;
use App\Models\Equipamiento;
use App\Models\Puesto;
use App\Models\Sector;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.puestos.index');
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
            '0' => 'No-Activo'
        ];
        
        $sectores = Sector::pluck('nombre', 'id');
        return view('admin.puestos.create', compact('estados', 'sectores'));
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
            'slug' => 'required|unique:puestos',
            'estado' => 'required',
        ]);

        $equipamiento = Equipamiento::create([
            'descripcion' => $request->descripcion_equipamiento,
            'fecha_actualizacion' => $request->fecha_limpieza,
        ]);

        $puesto = Puesto::create([
            'nombre' => $request->nombre,
            'slug' => $request->slug,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'referencia_lugar' => $request->referencia_lugar,
            'fecha_limpieza' => $request->fecha_limpieza,
            'sector_id' => $request->sector_id,
            'equipamiento_id' => $equipamiento->id,
        ]);

        return redirect()->route('admin.puestos.edit', $puesto)->with('info', 'El Puesto se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        return view('admin.puestos.show', compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route('admin.puestos.index')->with('eliminar', 'ok');
    }
}
