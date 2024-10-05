<?php

namespace Database\Seeders;

use Database\Factories\UsuarioFactory;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Exercicio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoSeeder::class);
        $this->call(AssinaturaSeeder::class);
        $this->call(ExercicioTiposSeeder::class);
    }
}
