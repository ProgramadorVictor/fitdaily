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
        Assinatura::create([
            'id' => 1,
            'assinatura' => 'Mensal',
            'valor' => 100.00,
            'descricao' => "Assinatura de 1 Mês",
            'desconto' => null,
        ]);
        Assinatura::create([
            'id' => 2,
            'assinatura' => 'Trimestral',
            'valor' => 255.00,
            'descricao' => "Assinatura de 3 Meses",
            'duracao' => "3",
            'desconto' => "15",
        ]);
        Assinatura::create([
            'id' => 3,
            'assinatura' => 'Anual',
            'valor' => 960.00,
            'descricao' => "Assinatura de 12 Meses",
            'duracao' => "12",
            'desconto' => "20",
        ]);
    }
}
