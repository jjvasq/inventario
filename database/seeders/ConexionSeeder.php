<?php

namespace Database\Seeders;

use App\Models\Conexion;
use Illuminate\Database\Seeder;

class ConexionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=10 ; $i++) { 
            Conexion::create([
                'boca_patch' => $i,
                'boca_switch' => $i,
                'fecha_impactada' => '2022-09-21',
                'conmutador_id' => 1,
                'en_uso' => 1,
                'ip_id' => $i,
            ]);
        }
        for ($i=1; $i<=10 ; $i++) { 
            Conexion::create([
                'boca_patch' => $i,
                'boca_switch' => $i,
                'fecha_impactada' => '2022-09-21',
                'conmutador_id' => 2,
            ]);
        }
    }
}
