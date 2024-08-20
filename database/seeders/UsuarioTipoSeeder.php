<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['nome' => 'Aluno'], 
            ['nome' => 'Treinador'],
        ];
        $usuarios = [
            [
                'tipo_id' => 2,
                'nome' => "Instrutor",
                'sobrenome' => "Padrão",
                'email' => "instrutorpadrao@gmail.com",
                'email_verificado' => now(),
                'cpf' => "999.999.999-99",
                'celular' => '(27) 99999-9999',
                'senha' => '$2y$10$su/fee.eUzh80nzLpqwwj.bBlkSpPcB5jaLRXEgVVJCEbXp7PK0aS',
                'nascimento' => now(),
            ],
            [
                'tipo_id' => 1,
                'nome' => "Aluno",
                'sobrenome' => "Padrão",
                'email' => "alunopadrao@gmail.com",
                'email_verificado' => now(),
                'cpf' => "000.000.000-00",
                'celular' => '(27) 99999-9999',
                'senha' => '$2y$10$su/fee.eUzh80nzLpqwwj.bBlkSpPcB5jaLRXEgVVJCEbXp7PK0aS',
                'nascimento' => now(),
            ],
        ];
        DB::table("tipos")->insert($tipos);
        DB::table("usuarios")->insert($usuarios);
    }
}
