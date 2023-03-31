<?php

namespace Database\Seeders;

use App\Models\ImagenMonitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenMonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImagenMonitor::create([
            'url' => 'monitores/monitor1.jpg',
            'monitor_id' => 1,
        ]);

        ImagenMonitor::create([
            'url' => 'monitores/monitor2.jpg',
            'monitor_id' => 1,
        ]);

        ImagenMonitor::create([
            'url' => 'monitores/monitor3.jpg',
            'monitor_id' => 2,
        ]);
    }
}
