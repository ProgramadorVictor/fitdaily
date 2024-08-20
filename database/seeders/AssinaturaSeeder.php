<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assinatura;

class AssinaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assinaturas = [
            [
                'nome' => 'Mensal',
                'valor' => 60.00,
                'descricao' => "Assinatura de 1 Mês",
                'duracao' => 30,
                'desconto' => null,
            ],
            [
                'nome' => 'Trimestral',
                'valor' => 150.00, 
                'descricao' => "Assinatura de 3 Meses",
                'duracao' => 90,
                'desconto' => 15,
            ],
            [
                'nome' => 'Semestral',
                'valor' => 288.00, 
                'descricao' => "Assinatura de 6 Meses",
                'duracao' => 180,
                'desconto' => 20,
            ],
            [
                'nome' => 'Anual',
                'valor' => 540.00, 
                'descricao' => "Assinatura de 12 Meses",
                'duracao' => 365,
                'desconto' => 25,
            ],
        ];
        Assinatura::insert($assinaturas);
    }
}
