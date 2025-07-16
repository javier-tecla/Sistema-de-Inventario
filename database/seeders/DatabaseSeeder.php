<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sucursal;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Sucursal::factory(10)->create();
        Categoria::factory(100)->create();

        User::factory(1)->create([
            'name' => 'Javier',
            'email' => 'cristman11@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
