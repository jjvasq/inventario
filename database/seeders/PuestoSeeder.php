<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Puesto 01 jefe STI.
        Puesto::create([
            'nombre' => 'STI Jefatura',
            'slug' => 'sti-jefatura',
            'descripcion' => 'Descripción del Puesto: Jefatura Perteneciente a Servicio de Tecnología de la Información.',
            'referencia_lugar' => 'situado al lado del puesto: 01 de STI',
            'fecha_limpieza' => '2022-09-21',
            'sector_id' => 1,
            'conexion_id' => 1,
            'equipamiento_id' => 1,
        ]);

        //Puesto 02-05 STI.
        for ($i=2; $i<=5 ; $i++) { 
            Puesto::create([
                'nombre' => 'STI-0'.($i-1),
                'slug' => 'sti-0'.($i-1),
                'descripcion' => 'Descripción del Puesto: '. ($i-1) .'Perteneciente a Servicio de Tecnología de la Información.',
                'referencia_lugar' => 'situado al lado del puesto: '.$i.' de STI',
                'fecha_limpieza' => '2022-09-21',
                'sector_id' => 1,
                'conexion_id' => $i,
                'equipamiento_id' => $i,
            ]);
        }

        //Puesto 06
        Puesto::create([
            'nombre' => 'Administración Jefatura',
            'slug' => 'administracion-jefatura',
            'descripcion' => 'Descripción del Puesto: Jefatura Perteneciente a Administración.',
            'referencia_lugar' => 'situado al lado del puesto: 01 de Administración',
            'fecha_limpieza' => '2022-09-21',
            'sector_id' => 2,
            'conexion_id' => 6,
            'equipamiento_id' => 6,
        ]);

        for ($i=1; $i<=4 ; $i++) { 
            Puesto::create([
                'nombre' => 'Administración-0'.$i,
                'slug' => 'administracion-0'.$i,
                'descripcion' => 'Descripción del Puesto: '. $i.'Perteneciente a Administración.',
                'referencia_lugar' => 'situado al lado del puesto: '.($i+1),
                'fecha_limpieza' => '2022-09-21',
                'sector_id' => 2,
                'conexion_id' => ($i+6),
                'equipamiento_id' => ($i+6),
            ]);
        }

        //Impresora Ricoh Dirección
        Puesto::create([
            'nombre' => 'Impresora Dirección',
            'slug' => 'impresora-direccion',
            'descripcion' => 'Ricoh 8400 DN (Impresora de alto volumen)',
            'referencia_lugar' => 'situado frente a personal',
            'fecha_limpieza' => '2022-09-21',
            'conexion_id' => 11,
            'equipamiento_id' => 11,
        ]);

        //Impresora Hp4015 Acceso Personal
        Puesto::create([
            'nombre' => 'Impresora Acceso Personal',
            'slug' => 'impresora-acceso-personal',
            'descripcion' => 'Hp 4015 (Impresora de alto volumen)',
            'referencia_lugar' => 'situado en acceso a personal',
            'fecha_limpieza' => '2022-09-21',
            'conexion_id' => 12,
            'equipamiento_id' => 12,
        ]);

        //Comunicacion
        Puesto::create([
            'nombre' => 'Comuncacion 01',
            'slug' => 'comunicacion_01',
            'descripcion' => 'Puesto utilizado para manejar agenda',
            'referencia_lugar' => 'Nuevo lugar, ex deposito Auditorio',
            'fecha_limpieza' => '2022-09-21',
            'conexion_id' => 13,
            'equipamiento_id' => 13,
        ]);

        Puesto::create([
            'nombre' => 'STI Soporte Puesto 02',
            'slug' => 'sti-soporte-puesto-02',
            'descripcion' => 'Puesto de soporte en planta baja',
            'referencia_lugar' => 'Oficina de Comunicación junto a la ventana',
            'fecha_limpieza' => '2022-09-21',
            'conexion_id' => 14,
            'equipamiento_id' => 14,
        ]);
    }
}
