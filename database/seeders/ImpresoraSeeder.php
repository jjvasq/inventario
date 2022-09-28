<?php

namespace Database\Seeders;

use App\Models\Impresora;
use Illuminate\Database\Seeder;

class ImpresoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Impresora::create([
            'nombre' => 'Ricoh 8400 dn',
            'slug' => 'ricoh-8400-dn',
            'descripcion' => 'Descripción de impresora Ricoh',
            'equipamiento_id' => 11,
        ]);

        Impresora::create([
            'nombre' => 'Hp 4015',
            'slug' => 'hp-4015',
            'descripcion' => 'Descripción de impresora hp 4015',
            'equipamiento_id' => 12,
        ]);
    }
}
