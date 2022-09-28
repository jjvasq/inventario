<?php

namespace Database\Seeders;

use App\Models\Impresora;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(EquipamientoSeeder::class);
        $this->call(CpuSeeder::class);
        $this->call(MonitorSeeder::class);
        $this->call(IpSeeder::class);
        $this->call(RackSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(ConmutadorSeeder::class);
        $this->call(ConexionSeeder::class);
        $this->call(PuestoSeeder::class);
        $this->call(ImpresoraSeeder::class);
    }
}
