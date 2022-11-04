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

        if($request->en_uso){
            $ips = Ip::select('id','direccion_ip','estado')
                    ->where('direccion_ip', '=', $request->direccion_ip)
                    ->get();
            if($ips->count()){
                foreach($ips as $ip){
                    if($ip->estado == 1){
                        return redirect()->route('admin.puestos.index')->with('ip', 'fail');    
                    }
                    else{
                        $ip->update([
                            'estado' => 1,
                        ]);
                    }
                }
            }
            else{
                $ip = Ip::create([
                    'direccion_ip' => $request->direccion_ip,
                    'estado' => 1,
                ]);
            }

            
        }
        
        if($request->en_uso){
            if($request->conectada_rack){
                $conexion = Conexion::create([
                    'boca_patch' => $request->boca_patch,
                    'boca_switch' => $request->boca_switch,
                    'conectada_rack' => $request->conectada_rack,
                    'en_uso' => $request->en_uso,
                    'fecha_impactada' => $request->fecha_impactada,
                    'conmutador_id' => $request->conmutador_id,
                    'ip_id' => $ip->id,
                ]);
            }
            else{
                $conexion = Conexion::create([
                    'boca_patch' => 0,
                    'boca_switch' => 0,
                    'conectada_rack' => $request->conectada_rack,
                    'en_uso' => $request->en_uso,
                    'fecha_impactada' => null,
                    'conmutador_id' => null,
                    'ip_id' => $ip->id,
                ]);
            }
        }
        else{
            if($request->conectada_rack){
                $conexion = Conexion::create([
                    'boca_patch' => $request->boca_patch,
                    'boca_switch' => $request->boca_switch,
                    'conectada_rack' => $request->conectada_rack,
                    'en_uso' => $request->en_uso,
                    'fecha_impactada' => $request->fecha_impactada,
                    'conmutador_id' => $request->conmutador_id,
                ]);
            }
            else{
                $conexion = Conexion::create([
                    'boca_patch' => 0,
                    'boca_switch' => 0,
                    'conectada_rack' => $request->conectada_rack,
                    'en_uso' => $request->en_uso,
                    'fecha_impactada' => null,
                    'conmutador_id' => null,
                ]);
            }
        }

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
        $estados = [
            '1' => 'Activo',
            '0' => 'No-Activo'
        ];
        $sectores = Sector::pluck('nombre', 'id');

        $puestos = Puesto::leftjoin('conexiones','puestos.conexion_id','=','conexiones.id')
                ->leftjoin('sectores','puestos.sector_id','=','sectores.id')
                ->leftjoin('equipamientos','puestos.equipamiento_id','=','equipamientos.id')
                ->leftjoin('ips','conexiones.ip_id','=','ips.id')
                ->leftjoin('conmutadores','conexiones.conmutador_id','=','conmutadores.id')
                ->select('puestos.*','conexiones.boca_patch as boca_patch',
                'conexiones.boca_switch as boca_switch','conexiones.conectada_rack as conectada_rack',
                'conexiones.conmutador_id as conmutador_id', 'conexiones.en_uso as en_uso',
                'sectores.nombre as nombre_sector','sectores.planta as planta_sector',
                'equipamientos.descripcion as descripcion_equipamiento',
                'ips.direccion_ip as direccion_ip','ips.estado as estado_ip',
                'conmutadores.numero as numero_conmutador','conmutadores.marca as marca_conmutador')
                ->where('puestos.id','=',$puesto->id)
                ->get();

        return view('admin.puestos.edit', compact('puestos', 'estados', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Tener en cuenta:
     *  Tengo que poder considerar el tema del cambio de ip...
     *  Si mantengo el mismo, funciona, porque busco el que tenía
     *  Si lo cambio, no funciona, según mi cabeza.
     *  Si tenía un ip, y ya no tiene...
     *  si no tenía y ahora sí...
     *  Por ahí si tengo un botón que desconecte.. Libero el Ip.
     *  Y después lo que es update. Si tiene ip, no se puede modificar, si los otros datos.
     *  Si no tiene, es el mismo caso que si lo desconectara, entonces ahí le permito dar el alta..
     *  ANALIZAR...
     */
    public function update(Request $request, Puesto $puesto)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:puestos,slug,$puesto->id",
            'estado' => 'required',
            'conmutador_id' => 'required',
        ]);
        
        $equipamiento = Equipamiento::findOrFail($puesto->equipamiento_id);
        $equipamiento->update([
            'descripcion' => $request->descripcion_equipamiento,
            'fecha_actualizacion' => $request->fecha_limpieza,
        ]);

        $conexion = Conexion::findOrFail($puesto->conexion_id);
        
        if($request->conectada_rack){
            $conexion->update([
                'boca_patch' => $request->boca_patch,
                'boca_switch' => $request->boca_switch,
                'conectada_rack' => $request->conectada_rack,
                'fecha_impactada' => $request->fecha_impactada,
                'conmutador_id' => $request->conmutador_id,
            ]);
        }
        else{
            $conexion->update([
                'boca_patch' => 0,
                'boca_switch' => 0,
                'conectada_rack' => $request->conectada_rack,
                'fecha_impactada' => null,
                'conmutador_id' => null,
            ]);
        }

        return redirect()->route('admin.puestos.index')->with('edit', 'ok');

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

    public function desconectar($conexion_id)
    {
        $conexion = Conexion::findOrFail($conexion_id);
        $ip = Ip::findOrFail($conexion->ip_id);
        $ip->update([
            'estado' => 0
        ]);
        $conexion->update([
            'en_uso' => 0,
            'ip_id' => null,
        ]);
        return redirect()->route('admin.puestos.index')->with('desconectar', 'ok');
    }
}
