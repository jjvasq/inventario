<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagenRack;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenRackController extends Controller
{
    public function create(Rack $rack)
    {
        return view('admin.racks.createImagenes', compact('rack'));
    }

    public function store(Request $request, Rack $rack)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/racks');

        $imagenRack = ImagenRack::create([
            'url' => $imagenUrl,
            'rack_id' => $rack->id,
        ]);

        return redirect()->route('admin.racks.imagenes', $rack)->with('info', 'imagen');
    }

    public function destroy(ImagenRack $imagenRack)
    {
        Storage::delete($imagenRack->url);

        $rack = Rack::findOrFail($imagenRack->rack_id);

        $imagenRack->delete();

        return redirect()->route('admin.racks.imagenes', $rack)->with('eliminar', 'ok');
    }
}
