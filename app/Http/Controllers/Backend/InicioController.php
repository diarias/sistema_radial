<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Entrevistas;
use App\Models\Programas;
use App\Models\Promociones;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        $hoy = Carbon::now($tz='GMT-5')->format('Y-m-d');
        $programas = Programas::where('estado', 1)->count();
        $personal = User::where('estado','1')->count();
        $entrevistasDia = Entrevistas::where('fecha', $hoy)->count();


        $entrevistasTabla = Entrevistas::where('fecha', $hoy)->get();


        $promocionesDia = Promociones::whereDate('fecha_inicio', '<=', $hoy)
        ->whereDate('fecha_fin', '>=', $hoy)
        ->count();

$promocionesTabla = Promociones::whereDate('fecha_inicio', '<=', $hoy)
             ->whereDate('fecha_fin', '>=', $hoy)
             ->get();





        //$promociones = Promociones::where('',1)->get();
        return view('director.panel', compact('hoy','programas','personal','entrevistasDia', 'entrevistasTabla','promocionesDia', 'promocionesTabla'));
        /*if (request()->get('table') == 'programas') {
            return $entrevistasDataTable->render('director.inicio.index', compact('entrevistasDataTable', 'programasDataTable','hoy','programas','personal','entrevistasDia'));
        }
        
          return $programasDataTable->render('director.inicio.index', compact('entrevistasDataTable', 'programasDataTable','hoy','programas','personal','entrevistasDia'));*/
    }
}
