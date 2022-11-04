<?php

namespace Database\Seeders;

use App\Models\Equipamiento;
use Illuminate\Database\Seeder;

class EquipamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=10 ; $i++) { 
            Equipamiento::create([
                'descripcion' => 'Equipamiento_'.$i,
                'fecha_actualizacion' => '2022-09-21',
            ]);
        }

        Equipamiento::create([
            'descripcion' => 'Equipamiento vinculado a Impresora Dirección',
            'fecha_actualizacion' => '2022-09-21',
        ]);

        Equipamiento::create([
            'descripcion' => 'Equipamiento vinculado a Impresora Acceso a Personal',
            'fecha_actualizacion' => '2022-09-21',
        ]);

        Equipamiento::create([
            'descripcion' => 'Equipamiento de Comuncación 01',
            'fecha_actualizacion' => '2022-09-21',
        ]);

        Equipamiento::create([
            'descripcion' => 'Máquina de soporte con todos los sistemas necesarios para soporte y desarrollo',
            'fecha_actualizacion' => '2022-09-21',
        ]);
    }
}
