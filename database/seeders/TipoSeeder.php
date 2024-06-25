<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'id' => 1,
            'funcao' => 'Aluno'
        ]);
        Tipo::create([
            'id' => 2,
            'funcao' => 'Treinador'
        ]);
    }
}
