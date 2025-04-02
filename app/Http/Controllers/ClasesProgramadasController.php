<?php

namespace App\Http\Controllers;

use App\Events\ClaseCancelada;
use App\Models\ClaseProgramada;
use App\Models\TipoClase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClasesProgramadasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clasesProgramadas = ClaseProgramada::whereBelongsTo(Auth::user(),'instructor')->where('date_time', '>', now())->oldest('date_time')->with('tipo_clases')->get();
        return view('instructor.programadas')->with('clasesProgramadas', $clasesProgramadas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_clase = TipoClase::all();
        return view('instructor.programar')->with('tipos_clase', $tipos_clase);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_time = $request->input('dia')." ".$request->input('hora');
        
        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => Auth::user()->id
        ]);

        $validated = $request->validate([
            'tipo_clases_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:clase_programadas,date_time|after:now'
        ]);

        ClaseProgramada::create($validated);
        return redirect()->route('programadas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClaseProgramada $claseProgramada)
    {

        if(Auth::user()->cannot('delete', $claseProgramada)){
            abort(403);
        }
        ClaseCancelada::dispatch($claseProgramada);

        $claseProgramada->delete();
        $claseProgramada->miembros()->detach();
        
        return redirect()->route('programadas.index');
    }
}
