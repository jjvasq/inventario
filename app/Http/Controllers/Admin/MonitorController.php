<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamiento;
use App\Models\ImagenMonitor;
use App\Models\Monitor;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            '0' => 'Baja',
            '2' => 'En Reparación',
            '3' => 'Hurtado',
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');

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

        /* if($request->file('file')){
            $url = Storage::put('monitor',$request->file('file'));

            $monitor->image()->create([
                'url' => $url
            ]);
            $imagen = ImagenMonitor::create([
                'url' => $url,
                'monitor_id' => $monitor->id,
            ]);
        } */

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
        $monitor = $monitore;
        return view('admin.monitores.show', compact('monitor'));
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
            '3' => 'Hurtado',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
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

        /* if($request->file('file')){
            $url = Storage::put('img',$request->file('file'));

            if($monitore->image){
                Storage::delete($monitore->image->url);

                $monitore->image()->update([
                    'url' => $url,
                ]);
            }
            else{
                $monitore->image()->create([
                    'url' => $url,
                ]);
            }
        } */

        return redirect()->route('admin.monitores.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitore)
    {
        //Acá hay que recorrer las imágenes creo. Hay que ver el cascade.
        /* if($monitore->image){
            Storage::delete($monitore->image->url);
        } */
        $monitore->delete();
        return redirect()->route('admin.monitores.index')->with('eliminar', 'ok');
    }

    public function imagenes(Monitor $monitor){
        $imagenes = ImagenMonitor::where('monitor_id','=',$monitor->id)->get();
        return view('admin.monitores.imagenes', compact('monitor','imagenes'));
    }
}
