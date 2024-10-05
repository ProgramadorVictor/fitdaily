<?php

namespace App\Providers;

use App\Events\RecuperarSenhaEvent;
use App\Events\VerificarEmailEvent;
use App\Listeners\RecuperarSenhaListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\VerificarEmailListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        VerificarEmailEvent::class => [
            VerificarEmailListener::class,
        ],
        RecuperarSenhaEvent::class => [
            RecuperarSenhaListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
