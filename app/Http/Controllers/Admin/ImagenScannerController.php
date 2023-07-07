<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagenScanner;
use App\Models\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenScannerController extends Controller
{
    public function create(Scanner $scanner)
    {
        return view('admin.scanners.createImagenes', compact('scanner'));
    }

    public function store(Request $request, Scanner $scanner)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenUrl = $request->file('file')->store('/public/scanners');

        $imagenScanner = ImagenScanner::create([
            'url' => $imagenUrl,
            'scanner_id' => $scanner->id,
        ]);

        return redirect()->route('admin.scanners.imagenes', $scanner)->with('info', 'imagen');
    }

    public function destroy(ImagenScanner $imagenScanner)
    {
        Storage::delete($imagenScanner->url);

        $scanner = Scanner::findOrFail($imagenScanner->scanner_id);

        $imagenScanner ->delete();

        return redirect()->route('admin.scanners.imagenes', $scanner)->with('eliminar', 'ok');
    }
}
