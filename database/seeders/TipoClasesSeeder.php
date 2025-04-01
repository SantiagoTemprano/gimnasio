<?php

namespace Database\Seeders;

use App\Models\TipoClase;
use Illuminate\Database\Seeder;

class TipoClasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoClase::create([
            'nombre' => 'Yoga',
            'descripcion' => fake()->text(),
            'minutos' => '30'
        ]);

        TipoClase::create([
            'nombre' => 'Pilates',
            'descripcion' => fake()->text(),
            'minutos' => '40'
        ]);

        TipoClase::create([
            'nombre' => 'Boxeo',
            'descripcion' => fake()->text(),
            'minutos' => '45'
        ]);

        TipoClase::create([
            'nombre' => 'Calistenia',
            'descripcion' => fake()->text(),
            'minutos' => '50'
        ]);
    }
}
