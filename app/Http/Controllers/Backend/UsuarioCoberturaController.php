<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsuarioCoberturasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Coberturas;
use App\Models\User;
use App\Models\UsuarioCoberturas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PHPMailer\PHPMailer\PHPMailer;

use function Termwind\render;

class UsuarioCoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsuarioCoberturasDataTable $dataTable, Request $request)
    {
        $usuarios = User::where('estado', 1)->get();
        $coberturas = Coberturas::findOrFail($request->cobertura);
        return $dataTable->render('director.perfil.usuario-cobertura.index', compact('usuarios', 'coberturas'));
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
            'usuario' => ['required'],
            'usuario.*' => [
                'distinct', // Asegura que no haya valores duplicados en el array
                Rule::unique('usuario_coberturas', 'usuario_id')->where(function ($query) use ($request) {
                    return $query->where('cobertura_id', $request->usuario_cobertura);
                }),
            ],
            'usuario_cobertura' => ['required']
        ]);

        $idCobertura = $request->usuario_cobertura;
        $idUsuarios = $request->usuario;

        foreach ($idUsuarios as $value) {
            $usuariocobertura = new UsuarioCoberturas();
            $usuariocobertura->cobertura_id = $idCobertura;
            $usuariocobertura->usuario_id = $value;
            $usuariocobertura->estado = '1';
            $usuariocobertura->save();
        }

        //Parte de correo electronico busca el programa y busca a los usuarios anclados a ese programa y envia a correo electronico 
        // dd($value, $promocionPrograma);
        $usuarioCoberturas = $this->obtenerUsuariosyCoberturas( $idCobertura);
         //dd($usuarioCoberturas);
        foreach ($usuarioCoberturas as $usuarioEnCobertura) {
            $email = $usuarioEnCobertura->email;
            $nombre = $usuarioEnCobertura->nombre;
            $apellido = $usuarioEnCobertura->apellido;
           
            $titulo = $usuarioEnCobertura->titulo;
            $fecha = $usuarioEnCobertura->fecha;
            $hora = $usuarioEnCobertura->hora;
            $descripcion = $usuarioEnCobertura->descripcion;
            $logistica = $usuarioEnCobertura->logistica;



            // Llama a la función para enviar el correo
            $this->enviarCorreo($email, $nombre, $apellido, $titulo, $fecha, $hora, $descripcion, $logistica);
        }


        toastr()->success('Personal fué asignados correctamente');
        return redirect()->back();
    }
    //Funcion para extrar el programa el usuario promociones y busca por programa
    public function obtenerUsuariosyCoberturas($idCobertura)
    {
        $resultado = DB::table('coberturas as c')
        ->join('usuario_coberturas as uc', 'c.id', '=', 'uc.cobertura_id')
        ->join('users as u', 'u.id', '=', 'uc.usuario_id')
        ->select('c.*', 'u.*', 'uc.*')
        ->where('c.id', '=', $idCobertura)
        ->get();
        return $resultado;
    }
    // Función para enviar correos electrónicos
    public function enviarCorreo($email, $nombre, $apellido, $titulo, $fecha, $hora, $descripcion, $logistica)
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
            $omail->setFrom("los40ecuadorsistema@gmail.com", "Nueva cobertura: '$titulo'");
            $omail->addAddress($email);
            $omail->Subject = "¡Nueva cobertura: $titulo!";
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
        <p>Tienes una nueva cobertura asignada con tiutlo <strong>$titulo</strong>, acontinuación te muestro
            los detalles:</p>
    
        <table>
            <thead>
                <tr>
                   
                    <th>Titulo de cobertura </th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Descripción</th>
                    <th>Logistica</th>
                </tr>
            </thead>
            <tbody>
                <tr>
    
                    
                    <td>$titulo</td>
                    <td>$fecha</td>
                    <td>$hora</td>
                    <td>$descripcion</td>
                    <td>$logistica</td>
    
                </tr>
    
            </tbody>
        </table>
        <br>
        <p>Si quieres saber más información sobre la cobertura visita el sistema: www.los40principales.com </p> ";
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
