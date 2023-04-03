<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use App\Models\Equipamiento;
use App\Models\ImagenCpu;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cpus.index');
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
        return view('admin.cpus.create', compact('estados', 'equipamientos'));
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
            'macaddress' => 'required',
            'procesador' => 'required',
            'ram_modelo' => 'required',
            'ram_cant_gb' => 'required',
        ]);

        $cpu = Cpu::create($request->all());

        if($request->file('file')){
            $url = Storage::put('img',$request->file('file'));

            $cpu->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.cpus.edit', $cpu)->with('info', 'El CPU se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cpu $cpu)
    {
        return view('admin.cpus.show', compact('cpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpu $cpu)
    {
        $estados = [
            '3' => 'Hurtado',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('admin.cpus.edit', compact('cpu', 'estados', 'equipamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cpu $cpu)
    {
        $request->validate([
            'macaddress' => 'required',
            'procesador' => 'required',
            'ram_modelo' => 'required',
            'ram_cant_gb' => 'required',
        ]);

        $cpu->update($request->all());

        if($request->file('file')){
            $url = Storage::put('img',$request->file('file'));

            if($cpu->image){
                Storage::delete($cpu->image->url);

                $cpu->image()->update([
                    'url' => $url,
                ]);
            }
            else{
                $cpu->image()->create([
                    'url' => $url,
                ]);
            }
        }

        return redirect()->route('admin.cpus.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpu $cpu)
    {
        if($cpu->image){
            Storage::delete($cpu->image->url);
        }
        $cpu->delete();
        return redirect()->route('admin.cpus.index')->with('eliminar', 'ok');
    }

    //Método para mostrar las imágenes del CPU:
    public function imagenes(Cpu $cpu){
        $imagenes = ImagenCpu::where('cpu_id','=',$cpu->id)->get();
        return view('admin.cpus.imagenes', compact('cpu','imagenes'));
    }
}
