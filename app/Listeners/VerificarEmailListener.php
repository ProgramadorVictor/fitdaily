<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VerificarEmailEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificarEmailMail;

class VerificarEmailListener implements ShouldQueue
{
    use InteractsWithQueue;
    public function handle(VerificarEmailEvent $event)
    {
        $email = $event->dados['email']; $nome_completo = $event->dados['nome_completo']; $token = $event->dados['token'];
        Mail::to($email)->send(new VerificarEmailMail($nome_completo, $token));
    }
}
