<?php

namespace Database\Seeders;

use App\Models\Rack;
use Illuminate\Database\Seeder;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=5 ; $i++) { 
            Rack::create([
                'nombre' => 'Rack-'.$i,
                'slug' => 'rack-'.$i,
                'descripcion' => 'Descripción del rack: Rack-'.$i,
                'referencia_lugar' => 'planta alta',
                'fecha_limpieza' => '2022-09-21',
            ]);
        }
    }
}
