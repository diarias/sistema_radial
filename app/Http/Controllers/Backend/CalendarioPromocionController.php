<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CalendarioPromociones;
use App\Models\Promociones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarioPromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promocionesTabla = Promociones::all();
        $calendario = CalendarioPromociones::all();



        $resultado = DB::table('calendario_promociones')
        ->join('promociones', 'calendario_promociones.promocion_id', '=', 'promociones.id')
        
        ->join('programas', 'calendario_promociones.programa_id', '=', 'programas.id')
        ->select('calendario_promociones.*', 'promociones.*', 'programas.*')
        ->get();
        return view('director.calendarios.calendario-promociones.index', compact('promocionesTabla','calendario','resultado'));
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
