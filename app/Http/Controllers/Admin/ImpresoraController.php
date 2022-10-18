<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamiento;
use App\Models\Impresora;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.impresoras.index');
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
        return view('admin.impresoras.create', compact('estados', 'equipamientos'));
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
            'slug' => 'required|unique:impresoras',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $impresora = Impresora::create($request->all());
        return redirect()->route('admin.impresoras.edit', $impresora)->with('info', 'La Impresora se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Impresora $impresora)
    {
        return view('admin.impresoras.show', compact('impresora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Impresora $impresora)
    {
        $estados = [
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        $equipamientos = Equipamiento::pluck('descripcion', 'id');
        return view('admin.impresoras.edit', compact('impresora', 'estados', 'equipamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impresora $impresora)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:impresoras,slug,$impresora->id",
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        $impresora->update($request->all());

        return redirect()->route('admin.impresoras.edit', $impresora)->with('info', 'La Impresora se actualizó correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impresora $impresora)
    {
        $impresora->delete();
        return redirect()->route('admin.impresoras.index')->with('eliminar', 'ok');
    }
}
