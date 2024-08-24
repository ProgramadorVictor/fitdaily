<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExercicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_id' => $this->faker->numberBetween(1, 2),
            'nome' => $this->faker->name(),
            'imagem' => 'imagem/exercicios/Peito/teste 3.gif'
        ];
    }
}
