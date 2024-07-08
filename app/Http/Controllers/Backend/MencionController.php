<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\MencionesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Menciones;
use Illuminate\Http\Request;

class MencionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MencionesDataTable $dataTable)
    { 
        return $dataTable->render('director.menciones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.menciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // dd($request->all());
         $request->validate([
            'cliente' => ['required', 'max:200'],
            'titulo' => ['required', 'max:200'],
            'inicio_mencion' => ['required'],
            'fin_mencion' => ['required'],
            'mencion' => ['required', 'max:2000'],

        ]);


        $mencion = new Menciones();

        $mencion->cliente = $request->cliente;

        $mencion->titulo = $request->titulo;
        $mencion->fecha_ini = $request->inicio_mencion;
        $mencion->fecha_fin = $request->fin_mencion;
        $mencion->frecuencia = $request->frecuencia;
        $mencion->mencion = $request->mencion;
        $mencion->estado = '1';

        $mencion->save();

        toastr()->success('Mencion Guardada');
        return redirect()->route('director.menciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menciones = Menciones::findOrFail($id);
        return view('director.menciones.detail', compact('menciones'));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menciones = Menciones::findOrFail($id);
        return view('director.menciones.edit', compact('menciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //dd($request->all());
         $request->validate([
            'cliente' => ['required', 'max:200'],
            'titulo' => ['required', 'max:200'],
            'inicio_mencion' => ['required'],
            'fin_mencion' => ['required'],
            'mencion' => ['required', 'max:2000'],

        ]);
        $mencion = Menciones::findOrFail($id);

        $mencion->cliente = $request->cliente;

        $mencion->titulo = $request->titulo;
        $mencion->fecha_ini = $request->inicio_mencion;
        $mencion->fecha_fin = $request->fin_mencion;
        $mencion->frecuencia = $request->frecuencia;
        $mencion->mencion = $request->mencion;
        $mencion->estado = '1';

        $mencion->save();

        toastr()->success('Mencion Editada');
        return redirect()->route('director.menciones.index');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mencion = Menciones::findOrFail($id);
        $mencion->delete();
        return response(['status'=>'success', 'message' => 'Borrado Satisfactoriamente']);
 
    }
}
