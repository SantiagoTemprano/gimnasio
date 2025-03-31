<?php

namespace App\Models;

use App\Models\ClaseProgramada;
use Illuminate\Database\Eloquent\Model;

class TipoClase extends Model
{
    public function clasesProgramadas(){
        $this->hasMany(ClaseProgramada::class);
    }
}
