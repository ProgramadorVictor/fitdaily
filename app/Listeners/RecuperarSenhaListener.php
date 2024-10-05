<?php

namespace App\Listeners;

use App\Events\RecuperarSenhaEvent;
use App\Mail\RecuperarSenhaMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RecuperarSenhaListener implements ShouldQueue
{
    use InteractsWithQueue;
    public function handle(RecuperarSenhaEvent $event)
    {
        $email = $event->dados['email']; $nome_completo = $event->dados['nome_completo']; $token = $event->dados['token'];
        Mail::to($email)->send(new RecuperarSenhaMail($nome_completo, $token));
    }
}
