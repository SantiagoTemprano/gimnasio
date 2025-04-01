<?php

namespace App\Policies;

use App\Models\ClaseProgramada;
use App\Models\User;

class ClaseProgramadaPolicy
{

    public function delete(User $user, ClaseProgramada $claseProgramada){
        return $user->id === $claseProgramada->instructor_id;
    }
}
