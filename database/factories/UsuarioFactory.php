<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
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
            'sobrenome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'celular' => $this->faker->tollFreePhoneNumber(),
            'senha' => $this->faker->password(),
            'nascimento' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
