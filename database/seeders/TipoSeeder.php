<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            [
                'id' => 1, 
                'nome' => 'Aluno'
            ], 
            [
                'id' => 2, 
                'nome' => 'Treinador'
            ],
        ];
        DB::table("tipos")->insert($tipos);
    }
}
