<?php

namespace App\Models;

use App\Models\User;
use App\Models\TipoClase;
use Illuminate\Database\Eloquent\Model;

class ClaseProgramada extends Model
{

    protected $guarded = null;
    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function tipo_clases(){
        return $this->belongsTo(TipoClase::class);
    }
}
