<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administradores = [
            [
                'cpf' => '000.000.000-00',
                'nome_completo' => 'Administrador Padrão',
                'senha' => '$2y$10$su/fee.eUzh80nzLpqwwj.bBlkSpPcB5jaLRXEgVVJCEbXp7PK0aS',
            ],
        ];
        DB::table('administradores')->insert($administradores);
    }
}
