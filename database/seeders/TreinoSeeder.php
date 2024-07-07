<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treino;
use App\Models\Exercicio;

class TreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exercicio1 = Exercicio::find(1);
        $exercicio2 = Exercicio::find(2);
        $exercicio3 = Exercicio::find(3);

        $usuario_id = 2;
    
        $dados_treino = [
            [
                'exercicio_id' => $exercicio1->id,
            ],
            [
                'exercicio_id' => $exercicio2->id,
            ],
            [
                'exercicio_id' => $exercicio3->id,
            ],
        ];
        
        Treino::create([
            'usuario_id' => $usuario_id,
            'treino' => json_encode($dados_treino),
        ]);
    
        $exercicio2 = Exercicio::find(2);
        $exercicio1 = Exercicio::find(1);

        $usuario_id = 1;
    
        $dados_treino = [
            [
                'exercicio_id' => $exercicio2->id,
            ],
            [
                'exercicio_id' => $exercicio1->id,
            ],
        ];
        
        Treino::create([
            'usuario_id' => $usuario_id,
            'treino' => json_encode($dados_treino),
        ]);
    }
}
