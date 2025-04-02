<?php

namespace App\Models;

use App\Models\User;
use App\Models\TipoClase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaseProgramada extends Model
{
    use HasFactory;
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

    public function miembros(){
        return $this->belongsToMany(User::class, 'reservas');
    }

    public function scopeProximas(Builder $query){
        return $query->where('date_time','>',now());
    }

    public function scopeNoProgramadas(Builder $query){
        return $query->whereDoesntHave('miembros', function($query) {
            $query->where('user_id',Auth::id());
        });
    }

    
}
