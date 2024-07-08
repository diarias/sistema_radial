<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CalendarioCoberturas;
use App\Models\Coberturas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarioCoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tablaCoberturas = Coberturas::all();
        $calendario = CalendarioCoberturas::all();
        $resultado = DB::table('calendario_coberturas')
        ->join('coberturas', 'calendario_coberturas.cobertura_id', '=', 'coberturas.id')
        ->join('users', 'calendario_coberturas.usuario_id', '=', 'users.id')
        ->select('calendario_coberturas.*', 'coberturas.*', 'users.*')
        ->get();
        return view('director.calendarios.calendario-coberturas.index', compact('tablaCoberturas','calendario','resultado'));
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
