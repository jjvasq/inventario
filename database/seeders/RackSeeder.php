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
        Rack::create([
            'nombre' => 'Rack Sector 10',
            'slug' => 'rack-sector-10',
            'descripcion' => 'Rack donde convergen gran cantidad de conexiones de planta alta',
            'referencia_lugar' => 'En el pasillo interno, frente a la línea de consultorios. Puertas de Calderas',
            'fecha_limpieza' => '2022-09-21',
        ]);

        Rack::create([
            'nombre' => 'Rack Telefonista',
            'slug' => 'rack-telefonista',
            'descripcion' => 'Rack donde se encuentran gran cantidad de conexiones, en particular los del ala de salud mental, archivo, farmacia, coordinación enfermería, etc.',
            'referencia_lugar' => 'Se encuentra en la oficina de la Telefonista.',
            'fecha_limpieza' => '2022-09-21',
        ]);

        Rack::create([
            'nombre' => 'Rack Personal',
            'slug' => 'rack-personal',
            'descripcion' => 'En este rack, están las conexiones de los equipamientos de Personal.',
            'referencia_lugar' => 'Rack Elevado, bajo llave. Se encuentra sobre el puesto 1 de Personal. Cerca de la oficina de la Jefatura de Personal.',
            'fecha_limpieza' => '2022-09-21',
        ]);

        Rack::create([
            'nombre' => 'Rack Legales',
            'slug' => 'rack-legales',
            'descripcion' => 'Rack donde convergen las conexiones de las oficinas del hall central.',
            'referencia_lugar' => 'Rack Elevado, bajo llave. Se encuentra en la oficina de Legales. Se encuentra sobre la puerta de ingreso.',
            'fecha_limpieza' => '2022-09-21',
        ]);

        Rack::create([
            'nombre' => 'Rack Guardia',
            'slug' => 'rack-guardia',
            'descripcion' => 'Rack donde convergen gran cantidad de conexiones de planta baja',
            'referencia_lugar' => 'Frente al ingreso de la guardia, por el pasillo interno. Zona de calderas.',
            'planta' => 0,
            'fecha_limpieza' => '2022-09-21',
        ]);
    }
}
