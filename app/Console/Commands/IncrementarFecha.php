<?php

namespace App\Console\Commands;

use App\Models\ClaseProgramada;
use Illuminate\Console\Command;

class IncrementarFecha extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:incrementar-fecha {--days=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aumentar las fechas de todas las clases programadas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $clasesProgramadas = ClaseProgramada::latest('date_time')->get();
        $clasesProgramadas->each(function($clase){
            $clase->date_time = $clase->date_time->addDays((int)$this->option('days'));
            $clase->save();
        });
    }
}
