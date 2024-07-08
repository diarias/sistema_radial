<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CalendarioMenciones;
use App\Models\Menciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarioMencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tablaMenciones = Menciones::all();
        $calendario = CalendarioMenciones::all();

        $resultado = DB::table('calendario_menciones')
        ->join('menciones', 'calendario_menciones.mencion_id', '=', 'menciones.id')
        
        ->join('programas', 'calendario_menciones.programa_id', '=', 'programas.id')
        ->select('calendario_menciones.*', 'menciones.*', 'programas.*')
        ->get();

       
        return view('director.calendarios.calendario-menciones.index', compact('tablaMenciones','calendario','resultado'));
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
