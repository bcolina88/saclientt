<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descripcion'  => $faker->name,
            'codigo' => str_random(5),
            'rif' => $this->faker->unique()->numberBetween($min = 1, $max = 15),
            'direccion' => => $faker->address,
            'email' => $faker->unique()->safeEmail,
            'telefono' => $faker->tollFreePhoneNumber,
        ];
    }

    
}
