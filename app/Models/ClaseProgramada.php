<?php

namespace App\Models;

use App\Models\User;
use App\Models\TipoClase;
use Illuminate\Database\Eloquent\Model;

class ClaseProgramada extends Model
{
    public function instructor(){
        $this->belongsTo(User::class, 'instructor_id');
    }

    public function tipoClase(){
        $this->belongsTo(TipoClase::class);
    }
}
