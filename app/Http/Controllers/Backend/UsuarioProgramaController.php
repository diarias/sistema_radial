<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsuarioProgramasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Programas;
use App\Models\User;
use App\Models\UsuarioProgramas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsuarioProgramasDataTable $dataTable, Request  $request)
    {
        $programas = Programas::all();
        $usuario = User::findOrFail($request->usuario);

        return $dataTable->render('director.usuarios.usuarios-programa.index', compact('programas', 'usuario'));
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
     //dd($request);
     $request->validate([
        'programa' => ['required'],
        'programa.*' => [
            'distinct', // Asegura que no haya valores duplicados en el array
            Rule::unique('usuario_programas', 'programa_id')->where(function ($query) use ($request) {
                 return $query->where('usuario_id', $request->usuario_programa);
            }),
        ],
        'usuario_programa' => ['required']
    ]);


    $usuarioPrograma = $request->usuario_programa;
    $programas = $request->programa;
    foreach ($programas as $value) {
        $usuarioProgramas = new UsuarioProgramas();
        $usuarioProgramas->usuario_id = $usuarioPrograma;
        $usuarioProgramas->programa_id = $value;
        $usuarioProgramas->estado = '1';

       $usuarioProgramas->save();
    }
    toastr()->success('Programas asignados correctamente');
    return redirect()->back();


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
        $usuariosPro = UsuarioProgramas::findOrFail($id);
        $usuariosPro->delete();
        return response(['status'=>'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
