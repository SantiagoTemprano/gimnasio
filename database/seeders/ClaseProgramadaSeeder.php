<?php

namespace Database\Seeders;

use App\Models\ClaseProgramada;
use Illuminate\Database\Seeder;

class ClaseProgramadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClaseProgramada::factory()->count(10)->create();
    }
}
