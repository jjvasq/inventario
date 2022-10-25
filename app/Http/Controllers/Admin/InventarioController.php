<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conexion;
use App\Models\Impresora;
use App\Models\Monitor;
use App\Models\Puesto;
use App\Models\Scanner;
use Illuminate\Http\Request;


class InventarioController extends Controller
{
    public function show($puesto_id){
        /* return "Está funcionando, el id es: " . $puesto_id; */
        $puesto = Puesto::findOrFail($puesto_id);
        $conexion = Conexion::findOrFail($puesto->conexion_id);
        /* $equipamiento = Equipamiento::findOrFail($puesto->equipamiento_id); */
        /* $cpu = Cpu::findOrFail($puesto->equipamiento_id); */
        /* $monitor = Monitor::findOrFail($puesto->equipamiento_id); */
        $monitores = Monitor::where('equipamiento_id','=',$puesto->equipamiento_id)->get();
        $scanners = Scanner::where('equipamiento_id','=',$puesto->equipamiento_id)->get();
        $impresoras = Impresora::where('equipamiento_id','=',$puesto->equipamiento_id)->get();
        return view('admin.inventario-show', compact('puesto', 'conexion', 'monitores', 'scanners', 'impresoras'));

        /* return view('admin.inventario.show'); */
    }
}
