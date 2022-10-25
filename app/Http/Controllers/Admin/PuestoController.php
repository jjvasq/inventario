<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conexion;
use App\Models\Cpu;
use App\Models\Equipamiento;
use App\Models\Impresora;
use App\Models\Ip;
use App\Models\Monitor;
use App\Models\Puesto;
use App\Models\Scanner;
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
        if($request->en_uso){
            if($request->conectada_rack){
                $request->validate([
                    'nombre' => 'required',
                    'slug' => 'required|unique:puestos',
                    'estado' => 'required',
                    'conmutador_id' => 'required',
                    'direccion_ip' => 'required',
                ]);
            }else{
                $request->validate([
                    'nombre' => 'required',
                    'slug' => 'required|unique:puestos',
                    'estado' => 'required',
                    'direccion_ip' => 'required',
                ]);
            }
        }else{
            if($request->conectada_rack){
                $request->validate([
                    'nombre' => 'required',
                    'slug' => 'required|unique:puestos',
                    'estado' => 'required',
                    'conmutador_id' => 'required',
                ]);
            }else{
                $request->validate([
                    'nombre' => 'required',
                    'slug' => 'required|unique:puestos',
                    'estado' => 'required',
                ]);
            }
        }

        $equipamiento = Equipamiento::create([
            'descripcion' => $request->descripcion_equipamiento,
            'fecha_actualizacion' => $request->fecha_limpieza,
        ]);

        $ip = Ip::create([
           'direccion_ip' => $request->direccion_ip,
           'estado' => 1,
        ]);

        $conexion = Conexion::create([
            'boca_patch' => $request->boca_patch,
            'boca_switch' => $request->boca_switch,
            'conectada_rack' => $request->conectada_rack,
            'en_uso' => $request->en_uso,
            'fecha_impactada' => $request->fecha_impactada,
            'conmutador_id' => $request->conmutador_id,
            'ip_id' => $ip->id,
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
            'conexion_id' => $conexion->id,
        ]);

        return redirect()->route('admin.puestos.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        $conexion = Conexion::findOrFail($puesto->conexion_id);
        /* $equipamiento = Equipamiento::findOrFail($puesto->equipamiento_id); */
        /* $cpu = Cpu::findOrFail($puesto->equipamiento_id); */
        /* $monitor = Monitor::findOrFail($puesto->equipamiento_id); */
        $monitores = Monitor::where('equipamiento_id','=',$puesto->equipamiento_id)->get();
        $scanners = Scanner::where('equipamiento_id','=',$puesto->equipamiento_id)->get();
        $impresoras = Impresora::where('equipamiento_id','=',$puesto->equipamiento_id)->get();
        return view('admin.puestos.show', compact('puesto', 'conexion', 'monitores', 'scanners', 'impresoras'));
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
