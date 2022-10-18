<?php

namespace Database\Seeders;

use App\Models\Scanner;
use Illuminate\Database\Seeder;

class ScannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scanner::create([
            'nombre' => 'Scanner Huella Turno 01',
            'slug' => 'scanner-huella-turno-01',
            'descripcion' => 'Descripción del Scanner de Huella Turno 01',
        ]);

        Scanner::create([
            'nombre' => 'Scanner Huella Turno 02',
            'slug' => 'scanner-huella-turno-02',
            'descripcion' => 'Descripción del Scanner de Huella Turno 02',
        ]);

        Scanner::create([
            'nombre' => 'Scanner Huella Turno 03',
            'slug' => 'scanner-huella-turno-03',
            'descripcion' => 'Descripción del Scanner de Huella Turno 03',
        ]);
        Scanner::create([
            'nombre' => 'Scanner Esterilización Codigo Barra 01',
            'slug' => 'scanner-esterilizacion-codigo-barra-01',
            'descripcion' => 'Descripción del Scanner de Esterilización',
        ]);
    }
}
