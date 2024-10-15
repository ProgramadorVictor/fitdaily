<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VerificarEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $email;
    public $token;
    public $nome_completo;
    public function __construct($nome_completo, $email, $email_token)
    {
        $this->nome_completo = $nome_completo;
        $this->email         = $email;
        $this->token         = $email_token;
    }
}
