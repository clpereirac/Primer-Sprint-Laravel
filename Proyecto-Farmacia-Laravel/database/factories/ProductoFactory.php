<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            'lote' => strtoupper($this->faker->bothify('???###')), // Usando el método bothify
            'fecha_de_vencimiento' => $this->faker->date('Y-m-d', '2025-12-31'),
            'fotografia' => $this->faker->imageUrl(640, 480, 'products', true), // Generando URL de imagen
        ];
    }
}
