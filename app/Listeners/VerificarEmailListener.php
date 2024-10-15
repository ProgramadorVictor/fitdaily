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
        Mail::to($event->email)->send(new VerificarEmailMail($event->nome_completo, $event->token));
    }
}
