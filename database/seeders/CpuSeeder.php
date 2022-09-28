<?php

namespace Database\Seeders;

use App\Models\Cpu;
use Illuminate\Database\Seeder;

class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //10 Cpu's el resto de los campos tienen default.
        for ($i=1; $i<=10 ; $i++) { 
            Cpu::create([
                'macaddress' => 'ABCDEFGH'.$i,
                'procesador' => 'Intel i5',
                'equipamiento_id' => $i,
            ]);
        }
    }
}
