<?php

namespace Database\Seeders;

use App\Models\Ip;
use Illuminate\Database\Seeder;

class IpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=50 ; $i++) { 
            Ip::create([
                'direccion_ip' => '10.1.104.'.($i+100),
            ]);
        }
    }
}
