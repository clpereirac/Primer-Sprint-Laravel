<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto; //importamos el modelo producto

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
     {
     Producto::factory(20)->create();
    
        DB::table('productos')->insert([
            [
                'nombre' => 'Paracetamol',
                'fotografia' => 'producto1.jpg',
                'descripcion' => 'El paracetamol es un medicamento utilizado para aliviar el dolor y reducir la fiebre.',
                'precio' => 10.50,
                'stock' => 100,
                'lote' => 'ABC123',
                'fecha_de_vencimiento' => '2024-12-31'
            ],
            [
                'nombre' => 'Omeprazol',
                'fotografia' => 'producto2.jpg',
                'descripcion' => 'Inhibidor de la bomba de protones',
                'precio' => 15.10,
                'stock' => 200,
                'lote' => 'DEF456',
                'fecha_de_vencimiento' => '2025-12-31'
            ],
            // más productos 
        ]);
    }
}