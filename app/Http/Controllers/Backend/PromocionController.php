<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PromocionesDataTable;
use App\Http\Controllers\Controller;
use App\Models\CalendarioPromociones;
use App\Models\Programas;
use App\Models\Promociones;
use App\Models\User;
use App\Trait\ImageUploadTrait;
use DateInterval;
use DatePeriod;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use ImageUploadTrait;
    public function index(PromocionesDataTable $dataTable)
    {
        return $dataTable->render('director.promociones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.promociones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'titulo' => ['required', 'max:200'],
            'fecha_inicio' => ['required'],
            'fecha_fin' => ['required'],
            'descripcion' => ['required', 'max:2000'],
            'imagen' => ['required', 'image'],

            'video' => ['required'],
        ]);

 // Iniciar una transacción
 DB::beginTransaction();
 try {

    $imagen = $this->uploadImage($request, 'imagen', 'uploads');
    $video = $this->uploadVideo($request, 'video', 'uploads');
    $promocion = new Promociones();

    $promocion->titulo = $request->titulo;
    $promocion->fecha_inicio = $request->fecha_inicio;
    $promocion->fecha_fin = $request->fecha_fin;
    $promocion->descripcion = $request->descripcion;
    $promocion->imagen = $imagen;
    $promocion->video = $video;
    $promocion->estado = '1';
    dd($promocion);
    $promocion->save();

   //Guardar en calendario 

   $programa = Programas::all();

   foreach ($programa as $programas) {
    

    $programa_id = $programas->id;

    $promocion_id = $promocion->id;

    // Accede a las propiedades del programa, por ejemplo:
    
// Obtener la diferencia en días entre la fecha de inicio y la fecha fin
$fechaInicio = new DateTime($request->fecha_inicio);
$fechaFin = new DateTime($request->fecha_fin);
$interval = DateInterval::createFromDateString('1 day');
$periodo = new DatePeriod($fechaInicio, $interval, $fechaFin);


// Iterar sobre cada día en el período y crear un registro en la tabla CalendarioPromociones
foreach ($periodo as $fecha) {
    $promocion_calendario = new CalendarioPromociones();

    $promocion_calendario->promocion_id = $promocion_id;
    $promocion_calendario->programa_id = $programa_id;
    $promocion_calendario->fecha = $fecha->format('Y-m-d'); // Formatear la fecha como "YYYY-MM-DD"
    $promocion_calendario->estado = '1';

    dd($promocion_calendario);
    $promocion_calendario->save();
}
    // Realiza las operaciones necesarias con cada programa
}
        // Obtener el ID de la entrevista recién creada
        DB::commit();
        toastr()->success('Promoción Guardada');
        return redirect()->route('director.promociones.index');

 } catch (Exception $e){
    DB::rollback();
        
    toastr()->error('Error al guardar la promoción');
    return back()->withErrors(['error' => 'Error al guardar la promoción']);
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
   public function enviarCorreo($email, $nombre, $apellido, $nombre_programa, $titulo, $fecha_inicio,  $fecha_fin,  $descripcion)
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
           $omail->setFrom("los40ecuadorsistema@gmail.com", "Nueva promoción en el programa'$nombre_programa'");
           $omail->addAddress($email);
           $omail->Subject = "¡Promoción los 40!";
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
                   <th>Titulo</th>
                   <th>Fecha Inicio</th>
                   <th>Fecha Fin</th>
                   <th>Descripción</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   
                   <td>$nombre_programa</td>
                   <td>$titulo</td>
                   <td>$fecha_inicio</td>
                   <td>$fecha_fin</td>
                   <td>$descripcion</td>
   
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
        $promociones = Promociones::findOrFail($id);
        return view('director.promociones.detail', compact('promociones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promociones = Promociones::findOrFail($id);

        return view('director.promociones.edit', compact('promociones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'titulo' => ['required', 'max:200'],
            'fecha_inicio' => ['required'],
            'fecha_fin' => ['required'],
            'descripcion' => ['required', 'max:2000'],
            'imagen' => ['nullable',  'image'],
            'video' => ['nullable'],
        ]);

        $promociones = Promociones::findOrFail($id);

        $imagenruta = $this->updateImage($request, 'imagen', 'uploads', $promociones->imagen);
        //dd($promociones->imagen);
        $videoruta = $this->updateImage($request, 'video', 'uploads', $promociones->video);
        //dd($promociones->video);
        $promociones->titulo = $request->titulo;
        $promociones->fecha_inicio = $request->fecha_inicio;
        $promociones->fecha_fin = $request->fecha_fin;
        $promociones->descripcion = $request->descripcion;
        $promociones->imagen =  empty(!$imagenruta) ? $imagenruta : $promociones->imagen;
        $promociones->video =  empty(!$videoruta) ? $videoruta : $promociones->video;
        $promociones->estado = '1';

        $promociones->save();

        toastr()->success('Promoción Actualizada');
        return redirect()->route('director.promociones.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promociones = Promociones::findOrFail($id);
        $promociones->delete();
        return response(['status' => 'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
