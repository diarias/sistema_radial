<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProgramasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Programas;
use App\Models\ProgramaUsuarios;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(ProgramasDataTable $dataTable)
    {
        return $dataTable->render('director.programas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.programas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'nombre_programa' => ['required', 'max:200'],
            'inicio_programa' => ['required', 'regex:/^([01][0-9]|2[0-3]):[0-5][0-9]$/'],
            'fin_programa' => ['required', 'regex:/^([01][0-9]|2[0-3]):[0-5][0-9]$/'],
            
            
            'descripcion_programa' => ['required' ,'max:2000'],
            'estado' => ['required'],
        ]);

        
        $programas = new Programas();

        $programas->nombre_programa = $request->nombre_programa;
        $programas->inicio_programa = $request->inicio_programa;
        $programas->fin_programa = $request->fin_programa;
        
        $programas->dia_lunes = $request->dia_lunes;
        if($programas->dia_lunes == 'on') {
         $programas->dia_lunes = 'on'; 
          
        }else{
         $programas->dia_lunes = '0';
        }

        $programas->dia_martes = $request->dia_martes;
        if($programas->dia_martes == 'on'){
         $programas->dia_martes = 'on';
        }else{
         $programas->dia_martes = '0';
        }

        $programas->dia_miercoles = $request->dia_miercoles;
        if($programas->dia_miercoles == 'on'){
            $programas->dia_miercoles = 'on';
        }else{
             $programas->dia_miercoles = '0';
        }

        $programas->dia_jueves = $request->dia_jueves;
        if($programas->dia_jueves == 'on'){
            $programas->dia_jueves = 'on';
        }else{
            $programas->dia_jueves = '0';
        }

        $programas->dia_viernes = $request->dia_viernes;
        if($programas->dia_viernes != 'on'){
            $programas->dia_viernes = 0;
        }else{
            $programas->dia_viernes = 'on';
        }

        $programas->dia_sabado = $request->dia_sabado;
        if($programas->dia_sabado == 'on'){
            $programas->dia_sabado = 'on';
        }else{
            $programas->dia_sabado = '0';
        }
        
        $programas->dia_domingo = $request->dia_domingo;
        if($programas->dia_domingo == 'on'){
            $programas->dia_domingo = 'on';
        }else{
            $programas->dia_domingo = '0';
        }

        $programas->descripcion_programa = $request->descripcion_programa;
        $programas->estado = $request->estado;

       $programas->save();

       toastr()->success('Programa Guardado');
       return redirect()->route('director.programa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $programas = Programas::findOrFail($id);
        return view('director.programas.detail', compact('programas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $programas = Programas::findOrFail($id);
        return view('director.programas.edit', compact('programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //dd($request->all());
         $request->validate([
            'nombre_programa' => ['required', 'max:200'],
            'inicio_programa' => ['required'],
            'fin_programa' => ['required'],
            'descripcion_programa' => ['required' ,'max:2000'],
            'estado' => ['required'],
        ]);

        // $brand = Brand::findOrFail($id);
        $programas = Programas::findOrFail($id);

        $programas->nombre_programa = $request->nombre_programa;
        $programas->inicio_programa = $request->inicio_programa;
        $programas->fin_programa = $request->fin_programa;
        
        $programas->dia_lunes = $request->dia_lunes;
        if($programas->dia_lunes == 'on') {
         $programas->dia_lunes = 'on'; 
          
        }else{
         $programas->dia_lunes = '0';
        }

        $programas->dia_martes = $request->dia_martes;
        if($programas->dia_martes == 'on'){
         $programas->dia_martes = 'on';
        }else{
         $programas->dia_martes = '0';
        }

        $programas->dia_miercoles = $request->dia_miercoles;
        if($programas->dia_miercoles == 'on'){
            $programas->dia_miercoles = 'on';
        }else{
             $programas->dia_miercoles = '0';
        }

        $programas->dia_jueves = $request->dia_jueves;
        if($programas->dia_jueves == 'on'){
            $programas->dia_jueves = 'on';
        }else{
            $programas->dia_jueves = '0';
        }

        $programas->dia_viernes = $request->dia_viernes;
        if($programas->dia_viernes != 'on'){
            $programas->dia_viernes = 0;
        }else{
            $programas->dia_viernes = 'on';
        }

        $programas->dia_sabado = $request->dia_sabado;
        if($programas->dia_sabado == 'on'){
            $programas->dia_sabado = 'on';
        }else{
            $programas->dia_sabado = '0';
        }
        
        $programas->dia_domingo = $request->dia_domingo;
        if($programas->dia_domingo == 'on'){
            $programas->dia_domingo = 'on';
        }else{
            $programas->dia_domingo = '0';
        }


        $programas->descripcion_programa = $request->descripcion_programa;
        $programas->estado = $request->estado;

        $programas->save();

        toastr()->success('Programa Actualizado');
        return redirect()->route('director.programa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  
    
    public function destroy(string $id)
    {
        $programa = Programas::findOrFail($id);
    
        // Verificar si el programa está asociado a algún usuario
        $asociaciones = ProgramaUsuarios::where('programa_id', $programa->id)->count();
    
        if ($asociaciones > 0) {
            return response(['status' => 'error', 'message' => 'El programa está asociado a uno o más usuarios. No se puede borrar.']);
        }
    
        // Si no está asociado a ningún usuario, proceder con el borrado
        $programa->delete();
    
        return response(['status' => 'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
