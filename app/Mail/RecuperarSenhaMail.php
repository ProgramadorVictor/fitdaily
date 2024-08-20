<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;

class RecuperarSenhaMail extends Mailable
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
        //Mandar para outro página onde, vá para recuperação de senha mostrando somente senha nova e repetir a senha.
        $url = 'http://'.$this->ip.':8000/recuperar-senha?token=' . $this->usuario->senhas->token;
        return $this->markdown('mail.recuperar-senha')
                    ->with(['url' => $url])
                    ->subject("Recuperação de senha - ".config('app.name'));
    }
}
