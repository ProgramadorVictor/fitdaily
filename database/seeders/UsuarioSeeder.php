<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            0 => [
                'id' => 1,
                'tipo_de_conta_id' => 2,
                'nome' => "Mei",
                'sobrenome' => "Mei",
                'email' => "meimei@gmail.com",
                'cpf' => "999.999.999-99",
                'celular' => '(27) 99999-9999',
                'senha' => '$2y$10$QMi15hLgymUV3mCfyRKc0eisY9evmdFx.mJ8iWzuJL9IxuFCx0k4O',
                'nascimento' => "00/00/0000",
            ],
            1 =>[
                'id' => 2,
                'tipo_de_conta_id' => 1,
                'nome' => "Gojo",
                'sobrenome' => "Satoru",
                'email' => "gojosatoru@gmail.com",
                'cpf' => "000.000.000-00",
                'celular' => '(27) 99999-9999',
                'senha' => '$2y$10$QMi15hLgymUV3mCfyRKc0eisY9evmdFx.mJ8iWzuJL9IxuFCx0k4O',
                'nascimento' => "00/00/0000",
            ],
            2 => [
                'id' => 3,
                'tipo_de_conta_id' => 2,
                'nome' => "Sukuna",
                'sobrenome' => "Ryomen",
                'email' => "sukunaryomen@gmail.com",
                'cpf' => "111.111.111-11",
                'celular' => '(27) 99999-9999',
                'senha' => '$2y$10$QMi15hLgymUV3mCfyRKc0eisY9evmdFx.mJ8iWzuJL9IxuFCx0k4O',
                'nascimento' => "00/00/0000",
            ]
        ];
        foreach($usuarios as $usuario){
            Usuario::create($usuario);
        }
    }
}
