<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CalendarioEntrevistas;
use App\Models\Entrevistas;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CalendarioEntrevistaController extends Controller
{
    public function entrevistas(){
        $entrevistasTabla = CalendarioEntrevistas::all();

        return view('director.calendarios.entrevistas', compact('entrevistasTabla'));
    }   


    public function edit(string $id){
return view('director.panel');
    }







    public function activarInactivarEntrevista($id)
{
    try {
        // Buscar el calendario de la entrevista
        $calendarioEntrevista = CalendarioEntrevistas::findOrFail($id);
        
        // Cambiar el estado de la entrevista en el calendario
        $calendarioEntrevista->estado = $calendarioEntrevista->estado == '1' ? '0' : '1'; // Alternar entre 1 y 0

        // Guardar los cambios en el calendario
        $calendarioEntrevista->save();

        // Obtener la entrevista asociada al calendario
        $entrevista = Entrevistas::findOrFail($calendarioEntrevista->entrevista_id);

        // Cambiar el estado de la entrevista
        $entrevista->estado = $calendarioEntrevista->estado;
        $entrevista->save();

        return redirect()->back()->with('success', 'Estado de la entrevista actualizado correctamente');
    } catch (ModelNotFoundException $e) {
        // Manejar excepción si no se encuentra el modelo
        return Redirect::back()->withErrors(['error' => 'La entrevista o el calendario asociado no se encontraron.']);
    } catch (\Exception $e) {
        // Manejar otras excepciones
        return Redirect::back()->withErrors(['error' => 'Ocurrió un error al actualizar el estado de la entrevista.']);
    }
}
}
