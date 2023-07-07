<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagenImpresora;
use App\Models\Impresora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenImpresoraController extends Controller
{
    public function create(Impresora $impresora)
    {
        return view('admin.impresoras.createImagenes', compact('impresora'));
    }

    public function store(Request $request, Impresora $impresora)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/impresoras');

        $imagenImpresora = ImagenImpresora::create([
            'url' => $imagenUrl,
            'impresora_id' => $impresora->id,
        ]);

        return redirect()->route('admin.impresoras.imagenes', $impresora /* $imagenImpresora->impresora_id */)->with('info', 'imagen');
    }

    public function destroy(ImagenImpresora $imagenImpresora)
    {
        Storage::delete($imagenImpresora->url);

        $impresora = Impresora::findOrFail($imagenImpresora->impresora_id);

        $imagenImpresora->delete();

        return redirect()->route('admin.impresoras.imagenes', $impresora)->with('eliminar', 'ok');
    }
}
