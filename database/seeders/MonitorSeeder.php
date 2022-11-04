<?php

namespace Database\Seeders;

use App\Models\Monitor;
use Illuminate\Database\Seeder;

class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=14 ; $i++) { 
            Monitor::create([
                'marca' => 'LG',
                'modelo' => 'LED-19A38',
                'serial' => 'A1B2C3D4'.$i,
                'equipamiento_id' => $i,
            ]);
        }
        Monitor::create([
            'marca' => 'LG',
            'modelo' => 'LED-24A38',
            'tamanio' => '24 Pulgadas',
            'serial' => 'A1B2C3D424',
            'equipamiento_id' => 14,
        ]);
    }
}
