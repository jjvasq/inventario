<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
/* use App\ImagenMonitor; */
use App\Models\ImagenMonitor;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImagenMonitorController extends Controller
{
    /**
     * No se utiliza
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.monitores.createImagenes');
    }

    /**
     * Este se utiliza, porque necesito indicarle a qué monitor pertenece
     * la imagen que estoy subiendo...
     */
    public function create2($id)
    {
        /* return $id; */
        return view('admin.monitores.createImagenes', compact('id'));
        /* return view('admin.conmutadores.create'); */
        /* return view('admin.monitores.createImagenes', compact($monitor)); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/monitores');

        //No utilizo la "url", porque después cuando busco la imagen, necesito el nombre nombre no más.
        $url = "/storage/" . $imagenUrl;

        /* return $url; */
    

        /* $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\monitores/' . $nombre; */

        /* Image::make($request->file('file'))
            ->save($ruta)
            ->resize(1200, null, function($constraint){
                $constraint->aspectRatio();
            }); */

        $imagenMonitor = ImagenMonitor::create([
            'url' => $imagenUrl,
            'monitor_id' => $id,
        ]);

        return redirect()->route('admin.monitores.imagenes',$imagenMonitor->monitor_id)->with('info', 'imagen');
    }

    /**
     * No se utiliza
     */
    public function show($id)
    {
        //
    }

    /**
     * No se utiliza
     */
    public function edit($id)
    {
        //
    }

    /**
     * No se utiliza
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImagenMonitor $imagenMonitore)
    {
        Storage::delete($imagenMonitore->url);

        $imagenMonitore->delete();

        return redirect()->route('admin.monitores.imagenes',$imagenMonitore->monitor_id)->with('eliminar','ok');
    }
}
