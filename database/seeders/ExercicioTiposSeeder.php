<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercicioTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                'nome' => 'Peito',
            ],
            [
                'nome' => 'Costas',
            ],
            [
                'nome' => 'Ombros',
            ],
            [
                'nome' => 'Pernas',
            ],
            [
                'nome' => 'Braços',
            ],
            [
                'nome' => 'Abdômen',
            ],
            [
                'nome' => 'Glúteos',
            ],
            [
                'nome' => 'Panturrilhas',
            ],
        ];
        DB::table('exercicio_tipos')->insert($tipos);
    }
}
