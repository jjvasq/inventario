<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conexion;
use App\Models\Conmutador;
use App\Models\ImagenConmutador;
use App\Models\Rack;
use App\Models\Sector;
use Illuminate\Http\Request;

class ConmutadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.conmutadores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::pluck('nombre', 'id');
        $racks = Rack::pluck('nombre', 'id');
        return view('admin.conmutadores.create', compact('sectores', 'racks'));
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
            'numero' => 'required|numeric',
            'marca' => 'required',
            'referencia_lugar' => 'required',
            'fecha_limpieza' => 'required',
        ]);

        $conmutador = Conmutador::create($request->all());
        return redirect()->route('admin.conmutadores.edit', $conmutador)->with('info', 'El Switch se creó correctamente');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Conmutador $conmutadore)
    {
        $conmutador = $conmutadore;

        $conexiones = Conexion::where('conmutador_id','=',$conmutador->id)
                                ->leftjoin('ips','conexiones.ip_id','=','ips.id')
                                ->join('puestos','conexiones.id','=','puestos.conexion_id')
                                ->select('conexiones.*','ips.direccion_ip as direccion_ip',
                                'puestos.nombre as nombre_puesto')
                                ->get();

        return view('admin.conmutadores.show', compact('conmutador', 'conexiones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Conmutador $conmutadore)
    {
        $sectores = Sector::pluck('nombre', 'id');
        $racks = Rack::pluck('nombre', 'id');
        return view('admin.conmutadores.edit', compact('conmutadore', 'sectores', 'racks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conmutador $conmutadore)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'marca' => 'required',
            'referencia_lugar' => 'required',
            'fecha_limpieza' => 'required',
        ]);

        $conmutadore->update($request->all());
        return redirect()->route('admin.conmutadores.edit', $conmutadore)->with('info', 'El Switch se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Conmutador $conmutadore)
    {
        $conmutadore->delete();
        return redirect()->route('admin.conmutadores.index')->with('eliminar', 'ok');
    }

    //Función para mostrar las imágenes de la Impresora:
    public function imagenes(Conmutador $conmutador){
        $imagenes = ImagenConmutador::where('conmutador_id','=',$conmutador->id)->get();
        return view('admin.conmutadores.imagenes', compact('conmutador','imagenes'));
    }
}
