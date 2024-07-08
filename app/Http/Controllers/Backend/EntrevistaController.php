<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EntrevistasDataTable;
use App\Http\Controllers\Controller;
use App\Models\CalendarioEntrevistas;
use App\Models\Entrevistas;
use App\Models\Programas;
use App\Models\ProgramaUsuarios;
use App\Trait\ImageUploadTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class EntrevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait;
    public function index(EntrevistasDataTable $dataTable)
    {
        $programas = Programas::all();
        return $dataTable->render('director.programas.programa-entrevista.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programas = Programas::all();
        return view('director.programas.programa-entrevista.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'imagen_entrevista' => ['required', 'image'],
            'nombre_entrevistado' => ['required', 'max:2000'],
            'usuario_instagram' => ['required', 'max:2000'],
            'evento_instagram' => ['required', 'max:2000'],
            'tema' => ['required', 'max:5000'],
            'fecha' => ['required'],
            'hora' => ['required'],
            'modalidad' => ['required'],
            'boletin' => ['required', 'max:5000'],
            'programa_id' => ['required'],
        ]);

    // Iniciar una transacción
        DB::beginTransaction();

try {

    $imagen_entrevista = $this->uploadImage($request, 'imagen_entrevista', 'uploads');
    $entrevista = new Entrevistas();
    $entrevista->imagen = $imagen_entrevista;
    $entrevista->nombre_entrevistado = $request->nombre_entrevistado;
    $entrevista->usuario_instagram = $request->usuario_instagram;
    $entrevista->evento_instagram = $request->evento_instagram;
    $entrevista->tema = $request->tema;
    $entrevista->fecha = $request->fecha;
    $entrevista->hora = $request->hora;
    $entrevista->modalidad = $request->modalidad;
    $entrevista->boletin = $request->boletin;
    $entrevista->programa_id = $request->programa_id;
    $entrevista->estado = '1';
    $entrevista->save();


        //Guardar en calendario 
        // Obtener el ID de la entrevista recién creada
        $entrevista_id = $entrevista->id;

        $entrevista_calendario = new CalendarioEntrevistas();

        $entrevista_calendario->entrevista_id =   $entrevista_id;
        $entrevista_calendario->programa_id = $request->programa_id;
        $entrevista_calendario->fecha = $request->fecha;
        $entrevista_calendario->estado = '1';

        
        $entrevista_calendario->save();






        // Obtener información para el correo
        $usuariosEnProgramas = $this->obtenerprogramasyusuarios($request->programa_id);
        //dd($usuariosEnProgramas);
        foreach ($usuariosEnProgramas as $correo) {
            $email = $correo->email;
            $nombre = $correo->nombre;
            $apellido = $correo->apellido;
            $nombre_programa = $correo->nombre_programa;
            $nombre_entrevistado = $request->nombre_entrevistado;
            $instagram_entrevistado = $request->usuario_instagram;

            $evento_instagram = $request->evento_instagram;
            $tema = $request->tema;
            $fecha = $request->fecha;
            $hora = $request->hora;
            $modalidad = $request->modalidad;
            $boletin = $request->boletin;
           //dd($email, $nombre, $apellido, $nombre_programa, $nombre_entrevistado, $instagram_entrevistado,  $evento_instagram,  $tema, $fecha, $hora, $modalidad, $boletin);
           $this->enviarCorreo($email, $nombre, $apellido, $nombre_programa, $nombre_entrevistado, $instagram_entrevistado,  $evento_instagram,  $tema, $fecha, $hora, $modalidad, $boletin);

        }
       

          DB::commit();
          toastr()->success('Entrevista Guardada');
          return redirect()->route('director.entrevistas.index');

} catch (Exception $e) {

    DB::rollback();
        
    toastr()->error('Error al guardar la entrevista');
    return back()->withErrors(['error' => 'Error al guardar la entrevista']);

}
       


    }

    // Función para extraer el programa, el usuario y las promociones y busca por programa
    public function obtenerprogramasyusuarios($programaId)
    {
        $resultados = DB::table('programa_usuarios as pu')
            ->join('users as u', 'u.id', '=', 'pu.usuario_id')
            ->join('programas as p', 'p.id', '=', 'pu.programa_id')
            ->select('pu.*', 'u.*', 'p.*')
            ->where('pu.programa_id', '=', $programaId)
            ->get();

        return $resultados;
    }
    // Función para enviar correos electrónicos
    public function enviarCorreo($email, $nombre, $apellido, $nombre_programa, $nombre_entrevistado, $instagram_entrevistado,  $evento_instagram,  $tema, $fecha, $hora, $modalidad, $boletin)
    {
        try {
            $logo = '<img src="img/fondo_login.png" width="180" height="30"><br><br>';

            $omail = new PHPMailer();
            $omail->isSMTP();
            $omail->Host = "smtp.gmail.com";
            $omail->Port = 465;
            $omail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $omail->SMTPAuth = true;
            $omail->Username = "los40ecuadorsistema@gmail.com";
            $omail->Password = "eiqgjpkyuebebmpk";
            // Configurar el contenido del correo
            $omail->setFrom("los40ecuadorsistema@gmail.com", "Nueva entrevista en el programa'$nombre_programa'");
            $omail->addAddress($email);
            $omail->Subject = "¡Entrevista para $nombre_entrevistado";
            $omail->CharSet = 'UTF-8';
            $omail->isHTML(true); // Indicar que el contenido es HTML

            // Construir el cuerpo del correo con una tabla
            $tableContent = "
            <style>
            table {
                width: 80%;
                margin: auto;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: center;
                border: 1px solid #dddddd;
            }
            th {
                background-color: #0070f7;
                color:white;
            }
            /* Estilo base del botón */
.btn-primary {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

/* Color de fondo y texto para el estado normal del botón */
.btn-primary {
  background-color: #007bff;
  color: #fff;
}

/* Cambio de color de fondo al pasar el ratón sobre el botón */
.btn-primary:hover {
  background-color: #0056b3;
}
         
        </style>
        <p>Hola, <strong>$nombre $apellido</strong></p>
        <p>Tienes una nueva entrevista asignada en el programa <strong>$nombre_programa</strong> acontinuación te muestro los detalles:</p>
       
        <table>
            <thead>
                <tr>
                    <th>Nombre del programa</th>
                    <th>Nombre de entrevistado</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Modalidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>$nombre_programa</td>
                    <td>$nombre_entrevistado</td>
                    <td>$fecha</td>
                    <td>$hora</td>
                    <td>$modalidad</td>
    
                </tr>
               
            </tbody>
         </table>
        <br>
        <p>Si quieres ver más información sobre la entrevista visita el sistema: <a href='' class='btn-primary'>Ir a sistema</a></p> ";
            $omail->Body = $tableContent;
            // Enviar el correo electrónico
            $omail->send();
        } catch (Exception $e) {
            // Manejar errores en el envío del correo
            echo "Error al enviar el correo: {$omail->ErrorInfo}";
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entrevistas = Entrevistas::findOrFail($id);
        $prog = Programas::findOrFail($entrevistas->programa_id);
        return view('director.programas.programa-entrevista.detail', compact('entrevistas', 'prog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entrevistas = Entrevistas::findOrFail($id);
        $programas = Programas::all();
        return view('director.programas.programa-entrevista.edit', compact('entrevistas', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $request->validate([
            'imagen_entrevista' => ['nullable', 'image', 'max:2000'],
            'nombre_entrevistado' => ['required', 'max:2000'],
            'usuario_instagram' => ['required', 'max:2000'],
            'evento_instagram' => ['required', 'max:2000'],
            'tema' => ['required', 'max:5000'],
            'fecha' => ['required'],
            'hora' => ['required'],
            'modalidad' => ['required'],
            'boletin' => ['required', 'max:5000'],
            'programa_id' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            $entrevista = Entrevistas::findOrFail($id);
            $imagenruta = $this->updateImage($request, 'imagen_entrevista', 'uploads', $entrevista->imagen);
            //dd($entrevista->imagen);
            $entrevista->imagen = empty(!$imagenruta) ? $imagenruta : $entrevista->imagen;
            $entrevista->nombre_entrevistado = $request->nombre_entrevistado;
            $entrevista->usuario_instagram = $request->usuario_instagram;
            $entrevista->evento_instagram = $request->evento_instagram;
            $entrevista->tema = $request->tema;
            $entrevista->fecha = $request->fecha;
            $entrevista->hora = $request->hora;
            $entrevista->modalidad = $request->modalidad;
            $entrevista->boletin = $request->boletin;
            $entrevista->programa_id = $request->programa_id;
            $entrevista->estado = '1';
            $entrevista->save();
    
    
    
             //Guardar en calendario 
            // Obtener el ID de la entrevista recién creada
            $entrevista_id = $entrevista->id;
    
            $entrevista_calendario = CalendarioEntrevistas::where('entrevista_id', $entrevista->id)->firstOrFail();
    
            $entrevista_calendario->entrevista_id =   $entrevista_id;
            $entrevista_calendario->programa_id = $request->programa_id;
            $entrevista_calendario->fecha = $request->fecha;
            $entrevista_calendario->estado = '1';
            $entrevista_calendario->save();
    

            DB::commit();
            toastr()->success('Entrevista Actualizada');
            return redirect()->route('director.entrevistas.index');


        } catch (Exception $e) {

            DB::rollback();
                
            toastr()->error('Error al editar la entrevista');
            return back()->withErrors(['error' => 'Error al editar la entrevista']);
        
        }
               



       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            // Busca y elimina la entrevista
            $entrevista = Entrevistas::findOrFail($id);
            $entrevista->delete();
    
            // Busca y elimina la entrada correspondiente en la tabla CalendarioEntrevistas
            $calendario_entrevista = CalendarioEntrevistas::where('entrevista_id', $id)->first();
            if ($calendario_entrevista) {
                $calendario_entrevista->delete();
            }
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Entrevista eliminada satisfactoriamente']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Error al eliminar la entrevista: ' . $e->getMessage()], 500);
        }
    }
}
