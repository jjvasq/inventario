<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use App\Models\Equipamiento;
use Illuminate\Http\Request;

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
            '0' => 'Baja'
        ];

        $equipamientos = Equipamiento::pluck('descripcion', 'id');
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
            'ram_cantidad_gb' => 'required',
        ]);

        $cpu = Cpu::create($request->all());
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
        return view('admin.cpu.show', compact('cpu'));
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
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        $equipamientos = Equipamiento::pluck('descripcion', 'id');
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
            'ram_cantidad_gb' => 'required',
        ]);

        $cpu->update($request->all());

        return redirect()->route('admin.cpus.edit', $cpu)->with('info', 'El CPU se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpu $cpu)
    {
        $cpu->delete();
        return redirect()->route('admin.cpus.index')->with('eliminar', 'ok');
    }
}
