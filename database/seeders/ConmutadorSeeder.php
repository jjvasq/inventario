<?php

namespace Database\Seeders;

use App\Models\Conmutador;
use Illuminate\Database\Seeder;

class ConmutadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=10 ; $i++) { 
            Conmutador::create([
                'numero' => $i,
                'marca' => 'Cisco',
                'descripcion' => 'Descripción del Switch: Cisco-'.$i,
                'referencia_lugar' => 'Sobre el Switch: Número:'.$i,
                'fecha_limpieza' => '2022-09-21',
                'rack_id' => 1,
            ]);
        }
    }
}
