<?php

namespace App\Listeners;

use App\Events\ClaseCancelada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificarClaseCancelada
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClaseCancelada $event): void
    {
        $claseProgramada = $event->claseProgramada;
        
    }
}
