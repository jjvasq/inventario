<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamiento;
use App\Models\ImagenScanner;
use App\Models\Puesto;
use App\Models\Scanner;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.scanners.index');
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
        return view('admin.scanners.create', compact('estados', 'equipamientos'));
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
            'slug' => 'required|unique:scanners',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $scanner = Scanner::create($request->all());
        return redirect()->route('admin.scanners.edit', $scanner)->with('info', 'El Scanner se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scanner $scanner)
    {
        return view('admin.scanners.show', compact('scanner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Scanner $scanner)
    {
        $estados = [
            '3' => 'Hurtado',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('admin.scanners.edit', compact('scanner', 'estados', 'equipamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scanner $scanner)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:scanners,slug,$scanner->id",
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        $scanner->update($request->all());

        return redirect()->route('admin.scanners.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scanner $scanner)
    {
        $scanner->delete();
        return redirect()->route('admin.scanners.index')->with('eliminar', 'ok');
    }

     //Función para mostrar las imágenes de la Impresora:
     public function imagenes(Scanner $scanner){
        $imagenes = ImagenScanner::where('scanner_id','=',$scanner->id)->get();
        return view('admin.scanners.imagenes', compact('scanner','imagenes'));
    }
}
