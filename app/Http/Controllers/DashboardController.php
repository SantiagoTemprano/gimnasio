<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = Auth::user()->rol;

        switch ($user) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;

            case 'miembro':
                return redirect()->route('miembro.dashboard');
                break;

            case 'instructor':
                return redirect()->route('instructor.dashboard');
                break;
                
            default:
                return redirect()->route('login');
                break;
        }
    }
}
