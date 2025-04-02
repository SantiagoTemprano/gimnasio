<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaseProgramada;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index(){
        $reservas = Auth::user()->reservas()->proximas()->get();
        return view('miembro.proximas')->with('reservas', $reservas);
    }

    public function create(){
        $clasesProgramadas = ClaseProgramada::proximas()->with('tipo_clases','instructor')->noProgramadas()->oldest('date_time')->get();
        return view('miembro.reservar')->with('clasesProgramadas', $clasesProgramadas);
    }

    public function store(Request $request){
        Auth::user()->reservas()->attach($request->clase_programada_id);
        return redirect()->route('reserva.index');
    }

    public function destroy(int $id)
    {
        Auth::user()->reservas()->detach($id);

        return redirect()->route('reserva.index');
    }
}
