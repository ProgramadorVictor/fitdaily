<?php

namespace Tests\App\Http\Controllers;

use App\Events\VerificarEmailEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;
use Database\Seeders\TipoSeeder;
use App\Models\Usuario;
use App\Models\Email;
use Illuminate\Support\Facades\Event;

class CadastroControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCadastroControllerCadastrarDadosValidos()
    {
        $this->seed(TipoSeeder::class);

        Event::fake();

        $dados = [
            'nome_completo' => 'John Doe',
            'email' => 'john@example.com',
            'email_confirmation' => 'john@example.com',
            'cpf' => '236.153.070-89',
            'celular' => '(28) 2835-1312',
            'senha' => '1234',
            'senha_confirmation' => '1234', 
            'nascimento' => '01/01/1990',
        ];

        $response = $this->post('/cadastro-realizado', $dados);

        $response->assertRedirect(route('login'));
        
        $response->assertSessionHas('alert', [
            'mensagem' => 'Cadastro realizado com sucesso!',
            'classe' => 'alert-success show',
        ]);

        $this->assertDatabaseHas('usuarios', [
            'email' => 'john@example.com',
            'nome_completo' => 'John Doe',
            'cpf' => '236.153.070-89', 
        ]);

        $usuario = Usuario::where('email', $dados['email'])->first();
        $email = Email::where('usuario_id', $usuario->id)->first();
        
        $dados_esperados = [
            'nome_completo' => $dados['nome_completo'],
            'email' => $dados['email'],
            'token' => $email->email_token,
        ];

        Event::assertDispatched(VerificarEmailEvent::class, function ($event) use ($dados_esperados) {
            return (
                $event->email         === $dados_esperados['email'] &&
                $event->token         === $dados_esperados['token'] &&
                $event->nome_completo === $dados_esperados['nome_completo']
            );
        });

    }
    public function testCadastroControllerCadastrarDadosInvalidos(){
        $dados_invalidos = [
            'nome_completo' => '',
            'email' => 'email@teste.com',
            'email_confirmation' => 'email@fake.com',
            'cpf' => '123.456.789-00',
            'celular' => '', 
            'senha' => '123', 
            'senha_confirmation' => '123', 
            'nascimento' => '16/13/2027',
        ];
    
        $response = $this->post('/cadastro-realizado', $dados_invalidos);
        // dd($response->getSession()->get('errors'));
        $response->assertSessionHasErrors([
            'nome_completo',
            'email',
            'cpf',
            'celular',
            'senha',
            'nascimento',
        ]);

        $this->assertDatabaseMissing('usuarios', [
            'email' => 'email@fake.com',
        ]);
    }
}
