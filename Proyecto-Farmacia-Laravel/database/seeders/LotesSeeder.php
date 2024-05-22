<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lote;

class LotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Lote::factory(20)->create();
       //Participante::factory(100)->create();
        Lote::factory()->count(0)->create();
    }
}
