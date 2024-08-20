<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;

class VerificarMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $usuario;
    public $ip;
    public function __construct(Usuario $usuario, $ip)
    {
        $this->usuario = $usuario;
        $this->ip = $ip;
    }   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = 'http://'.$this->ip.':8000/email-verificacao?token=' . $this->usuario->emails->email_token;
        return $this->markdown('mail.verificar-email')
                    ->with(['url' => $url])
                    ->subject("Verifique o seu email na ".config('app.name'));
    }
}
