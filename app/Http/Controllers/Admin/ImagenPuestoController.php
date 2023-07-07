<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagenPuesto;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenPuestoController extends Controller
{
    public function create(Puesto $puesto)
    {
        return view('admin.puestos.createImagenes', compact('puesto'));
    }

    public function store(Request $request, Puesto $puesto)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/puestos');

        $imagenPuesto = ImagenPuesto::create([
            'url' => $imagenUrl,
            'puesto_id' => $puesto->id,
        ]);

        return redirect()->route('admin.puestos.imagenes', $puesto)->with('info', 'imagen');
    }

    public function destroy(ImagenPuesto $imagenPuesto)
    {
        Storage::delete($imagenPuesto->url);

        $puesto = Puesto::findOrFail($imagenPuesto->puesto_id);

        $imagenPuesto->delete();

        return redirect()->route('admin.puestos.imagenes', $puesto)->with('eliminar', 'ok');
    }
}
