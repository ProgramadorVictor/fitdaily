<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TipoSeeder::class);
        $this->call(AssinaturaSeeder::class);
        $this->call(ExercicioSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(TreinoSeeder::class);
    }
}
