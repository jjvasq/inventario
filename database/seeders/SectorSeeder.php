<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create([
            'nombre' => 'STI',
            'slug' => 'sti',
            'descripcion' => 'Servicio de Tecnología de la Información',
            'referencia_lugar' => 'Planta alta, frente a Sector 12',
        ]);
        
        Sector::create([
            'nombre' => 'Administración',
            'slug' => 'administracion',
            'descripcion' => 'Sector encargado de la Administración Empresarial.',
            'referencia_lugar' => 'Planta alta, frente Desarrollo Institucional.',
        ]);

        Sector::create([
            'nombre' => 'Personal',
            'slug' => 'personal',
            'descripcion' => 'Servicio al personal del Hospital.',
            'referencia_lugar' => 'Planta alta, frente Secretaría de Dirección',
        ]);

        Sector::create([
            'nombre' => 'Comunicaciones',
            'slug' => 'comunicaciones',
            'descripcion' => 'Servicio de Comuncaciones Hospitalarias.',
            'referencia_lugar' => 'Planta baja, pasillo Auditorio.',
            'planta' => 0,
        ]);
    }
}
