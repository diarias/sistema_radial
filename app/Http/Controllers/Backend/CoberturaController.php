<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CoberturasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Coberturas;
use Illuminate\Http\Request;

class CoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CoberturasDataTable $dataTable)

    {
      return $dataTable->render('director.coberturas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.coberturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $request->validate([
            'titulo' => ['required'],
            'fecha' => ['required'],
            'hora' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
            'descripcion' => ['required', 'max:2000'],
            'logistica' => ['required', 'max:2000'],
        ]);

        $coberturas = new Coberturas();

        $coberturas->titulo = $request->titulo;
        $coberturas->fecha = $request->fecha;
        $coberturas->hora = $request->hora;
        $coberturas->descripcion = $request->descripcion;
        $coberturas->logistica = $request->logistica;
        $coberturas->estado = '1';
        $coberturas->save();

        toastr()->success('Cobertura Guardada');
        return redirect()->route('director.coberturas.index');
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
