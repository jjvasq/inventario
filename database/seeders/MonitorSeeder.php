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
        for ($i=1; $i<=10 ; $i++) { 
            Monitor::create([
                'marca' => 'LG',
                'modelo' => 'LED-19A38',
                'serial' => 'A1B2C3D4'.$i,
                'equipamiento_id' => $i,
            ]);
        }
    }
}
