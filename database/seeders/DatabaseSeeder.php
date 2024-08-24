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
        $this->call(UsuarioTipoSeeder::class);
        $this->call(AssinaturaSeeder::class);
        $this->call(AdministradorSeeder::class);
        $this->call(ExercicioTiposSeeder::class);
        Usuario::factory()->count(50)->create();
        Exercicio::factory()->count(50)->create();
    }
}
