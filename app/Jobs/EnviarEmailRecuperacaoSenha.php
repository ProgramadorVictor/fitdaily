<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\RecuperarSenhaMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Usuario;

class EnviarEmailRecuperacaoSenha implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->usuario->email)->send(new RecuperarSenhaMail($this->usuario, $this->ip));
    }
}
