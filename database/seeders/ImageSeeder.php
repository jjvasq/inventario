<?php

namespace Database\Seeders;

use App\Models\Cpu;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Image::create([
            'url' => 'cpus/cpu1.jpg',
            'imageable_id' => 1,
            'imageable_type' => Cpu::class,
        ]);
        
        Image::create([
            'url' => 'cpus/cpu2.png',
            'imageable_id' => 2,
            'imageable_type' => Cpu::class,
        ]);

        Image::create([
            'url' => 'cpus/cpu3.jpg',
            'imageable_id' => 3,
            'imageable_type' => Cpu::class,
        ]);
    }
}
