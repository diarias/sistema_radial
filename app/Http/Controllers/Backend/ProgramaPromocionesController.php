<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProgramaPromocionesDataTable;
use App\DataTables\ProgramasDataTable;
use App\Http\Controllers\Controller;
use App\Models\CalendarioPromociones;
use App\Models\ProgramaPromociones;
use App\Models\Programas;
use App\Models\Promociones;
use App\Models\User;
use App\Models\UsuarioProgramas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
//correo electronico
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ProgramaPromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProgramaPromocionesDataTable $dataTables, Request $request)
    {
        $programas = Programas::all();
        $promociones = Promociones::findOrFail($request->promocion);

        return $dataTables->render('director.programas.programa-promocion.index', compact('programas', 'promociones'));
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
        $request->validate([
            'programa' => ['required'],
            'programa.*' => [
                'distinct', // Asegura que no haya valores duplicados en el array
                Rule::unique('programa_promociones', 'programa_id')->where(function ($query) use ($request) {

                    return $query->where('promocion_id', $request->promocion_programa);
                }),
            ],
            'promocion_programa' => ['required']
        ]);
        $promocionPrograma = $request->promocion_programa;
        $programas = $request->programa;
        //dd($promocionPrograma, $programas);
        //obtener informacion sobre el programa
        $promocionesTabla = Promociones::all();
        $calendario = CalendarioPromociones::all();
        // Obtener información sobre la promoción
        $promocion = Promociones::find($promocionPrograma);
        $fechaInicioPromocion = $promocion->fecha_inicio;
        $fechaFinPromocion = $promocion->fecha_fin;

        // Obtener un array de fechas entre la fecha de inicio y la fecha de fin
        $fechaPromocion = $this->getFechasPromocion($fechaInicioPromocion, $fechaFinPromocion);
        //Guarda en la tabla programa promociones
        foreach ($programas as $value) {
            $promocionprograma = new ProgramaPromociones();
            $promocionprograma->promocion_id = $promocionPrograma;
            $promocionprograma->programa_id = $value;
            $promocionprograma->estado = '1';
            $promocionprograma->save();
            //guarda en la tabla calendario promociones
            foreach ($fechaPromocion as $fecha) {
                $calendario = new CalendarioPromociones();

                $calendario->promocion_id = $promocionPrograma;
                $calendario->programa_id = $value;
                $calendario->fecha = $fecha;
                $calendario->estado = '1';
                $calendario->save();
            }
            //Parte de correo electronico busca el programa y busca a los usuarios anclados a ese programa y envia a correo electronico 
            // dd($value, $promocionPrograma);
            $usuariosEnProgramas = $this->obtenerUsuariosYProgramas($value, $promocionPrograma);
            // dd($usuariosEnProgramas);
            foreach ($usuariosEnProgramas as $usuarioEnPrograma) {
                $email = $usuarioEnPrograma->email;
                $nombre = $usuarioEnPrograma->nombre;
                $apellido = $usuarioEnPrograma->apellido;
                $nombre_programa = $usuarioEnPrograma->nombre_programa;
                $titulo = $usuarioEnPrograma->titulo;
                $fecha_inicio = $usuarioEnPrograma->fecha_inicio;
                $fecha_fin = $usuarioEnPrograma->fecha_fin;
                $descripcion = $usuarioEnPrograma->descripcion;


                // Llama a la función para enviar el correo
                $this->enviarCorreo($email, $nombre, $apellido, $nombre_programa, $titulo, $fecha_inicio, $fecha_fin, $descripcion);
            }
        }
        toastr()->success('Programas asignados correctamente');
        return redirect()->back();
    }


    //Funcion para extrar el programa el usuario promociones y busca por programa
    public function obtenerUsuariosYProgramas($id_programa, $id_promocion)
    {
        $resultado = DB::table('programas as p')
            ->join('programa_usuarios as pu', 'p.id', '=', 'pu.programa_id')
            ->join('users as u', 'u.id', '=', 'pu.usuario_id')
            ->join('programa_promociones as pp', 'p.id', '=', 'pp.programa_id')
            ->join('promociones as pr', 'pr.id', '=', 'pp.promocion_id')
            ->select('p.*', 'u.*', 'pu.*', 'pp.*', 'pr.*')
            ->where('p.id', '=', $id_programa)
            ->where('pr.id', '=', $id_promocion)
            ->get();
        return $resultado;
    }
    // Función para enviar correos electrónicos
    public function enviarCorreo($email, $nombre, $apellido, $nombre_programa, $titulo, $fecha_inicio, $fecha_fin, $descripcion)
    {
        try {

            $omail = new PHPMailer();
            $omail->isSMTP();
            $omail->Host = "smtp.gmail.com";
            $omail->Port = 465;
            $omail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $omail->SMTPAuth = true;
            $omail->Username = "los40ecuadorsistema@gmail.com";
            $omail->Password = "eiqgjpkyuebebmpk";
            // Configurar el contenido del correo
            $omail->setFrom("los40ecuadorsistema@gmail.com", "Creación de nueva promoción '$titulo'");
            $omail->addAddress($email);
            $omail->Subject = "¡Nueva promocion: $titulo!";
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
    
            th,
            td {
                padding: 10px;
                text-align: center;
                border: 1px solid #dddddd;
            }
    
            th {
                background-color: #0070f7;
                color: white;
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
        <p>Tienes una nueva promoción asignada con tiutlo <strong>$titulo</strong>, en el programa <strong>$nombre_programa</strong> acontinuación te muestro
            los detalles:</p>
    
        <table>
            <thead>
                <tr>
                    <th>Nombre del programa</th>
                    <th>Titulo de promo </th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
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
        <p>Si quieres saber más información sobre la promocion visita el sistema: www.los40principales.com </p> ";
            $omail->Body = $tableContent;
            // Enviar el correo electrónico
            $omail->send();
        } catch (Exception $e) {
            // Manejar errores en el envío del correo
            echo "Error al enviar el correo: {$omail->ErrorInfo}";
        }
    }

    // Función para obtener un array de fechas entre la fecha de inicio y la fecha de fin
    public function getFechasPromocion($fechaInicio, $fechaFin)
    {
        $fechas = [];
        $fechaInicio = new \DateTime($fechaInicio);
        $fechaFin = new \DateTime($fechaFin);
        while ($fechaInicio <= $fechaFin) {
            $fechas[] = $fechaInicio->format('Y-m-d');
            $fechaInicio->modify('+1 day');
        }
        return $fechas;
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
        $programapro = ProgramaPromociones::findOrFail($id);
        $programapro->delete();
        return response(['status' => 'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
