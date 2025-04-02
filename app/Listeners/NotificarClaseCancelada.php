<?php

namespace App\Listeners;

use App\Events\ClaseCancelada;
use App\Mail\ClaseCanceladaMail;
use Illuminate\Support\Facades\Mail;

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
        $miembro = $event->claseProgramada->miembros();

        $nombreClase = $event->claseProgramada->tipo_clases->nombre;
        $diaClase = $event->claseProgramada->date_time;
        $detalles = compact('nombreClase','diaClase');
        
        $miembro->each(function($user) use ($detalles){
            Mail::to($user)->send(new ClaseCanceladaMail($detalles));
        });
    }
}
