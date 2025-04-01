<?php

namespace App\Models;

use App\Models\ClaseProgramada;
use Illuminate\Database\Eloquent\Model;

class TipoClase extends Model
{
    public function clasesProgramadas(){
        return $this->hasMany(ClaseProgramada::class);
    }
}
