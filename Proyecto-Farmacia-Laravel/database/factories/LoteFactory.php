<?php
namespace Database\Factories;
use App\Models\Lote;
use App\Models\Producto; //  Producto aquí
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoteFactory extends Factory
{
    protected $model = Lote::class;

    public function definition()
    {
        return [
            'producto_id' => \App\Models\Producto::factory()->create()->id,
            'lote' => $this->faker->uuid,
            'fecha_de_vencimiento' => $this->faker->dateTimeThisMonth(),
            //'fecha_vencimiento' => $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
        ];
    }
}

