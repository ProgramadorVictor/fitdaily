<?php

namespace Tests\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Usuario;
use Database\Seeders\TipoSeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginControllerLogar()
    {
        $this->seed(TipoSeeder::class);
        
        $usuario = Usuario::create([
            'nome_completo' => 'John Doe',
            'email' => 'john@example.com',
            'email_confirmation' => 'john@example.com',
            'cpf' => '236.153.070-89',
            'celular' => '(28) 2835-1312',
            'senha' => Hash::make('1234'),
            'senha_confirmation' => '1234', 
            'nascimento' => '1990-10-10',
        ]);

        $dados = [
            'cpf' => '236.153.070-89',
            'senha' => '1234',
        ];
        $response = $this->post('/login-realizado', $dados);

        $this->actingAs($usuario);

        $this->assertAuthenticatedAs($usuario);

        $response->assertRedirect(route('tela-principal'));

    }
}
