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
            'tipo' => 'Mensal',
            'valor' => 100.00
        ]);
        Assinatura::create([
            'id' => 2,
            'tipo' => 'Trimestral',
            'valor' => 255.00
        ]);
        Assinatura::create([
            'id' => 3,
            'tipo' => 'Anual',
            'valor' => 960.00
        ]);
    }
}
