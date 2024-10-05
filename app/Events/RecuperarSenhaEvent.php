<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RecuperarSenhaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $dados;
    public function __construct($dados)
    {
        $this->dados = $dados;
    }
}
