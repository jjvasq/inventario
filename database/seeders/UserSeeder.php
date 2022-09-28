<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan José Vasquez',
            'email' => 'vasquezjuan_jose@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Mariela Castillo',
            'email' => 'marielahcastillo@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::factory(5)->create();
    }
}
