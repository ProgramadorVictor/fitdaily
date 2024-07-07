<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercicios')->insert([
            ['caminho' => 'images/agachamento/1.gif', 'nome' => 'Agachamento Lateral'],
            ['caminho' => 'images/flexao/1.gif', 'nome' => 'Flexão Diamante'],
            ['caminho' => 'images/outros/1.gif', 'nome' => 'Lunges Para Frente'],
        ]);
    }
}
