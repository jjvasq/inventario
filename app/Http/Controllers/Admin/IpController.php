<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ip;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class IpController extends Controller
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ips.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ips.create');
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
            'direccion_ip' => 'required',
            'estado' => 'required',
        ]);

        $ip = Ip::create($request->all());

        return redirect()->route('admin.ips.edit', $ip)->with('info', 'El Ip se Ingresó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ip $ip)
    {
        return view('admin.ips.show', compact('ip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ip $ip)
    {
        return view('admin.ips.edit', compact('ip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ip $ip)
    {
        $request->validate([
            'direccion_ip' => 'required',
            'estado' => 'required',
        ]);

        $ip->update($request->all());

        return redirect()->route('admin.ips.edit', $ip)->with('info', 'El Ip se Actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ip $ip)
    {
        $ip->delete();
        return redirect()->route('admin.ips.index')->with('info', 'El Ip, se eliminó correctamente');
    }
}
