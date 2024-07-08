<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProgramaUsuariosDataTable;
use App\DataTables\UsuarioProgramasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Programas;
use App\Models\ProgramaUsuarios;
use App\Models\User;
use App\Models\UsuarioProgramas;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule as ValidationRule;
use PHPMailer\PHPMailer\PHPMailer;

class ProgramaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProgramaUsuariosDataTable $dataTables, Request $request)
    {
        $usuario = User::all();
        $programa = Programas::findOrFail($request->programa);

        return $dataTables->render('director.programas.programa-usuario.index', compact('usuario', 'programa'));
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
                'distinct',
                Rule::unique('programa_usuarios', 'usuario_id')
                    ->where('programa_id', $request->usuario_programa)
            ],
            'usuario_programa' => ['required']
        ]);

        $programaUsuario = $request->usuario_programa;
        $programas = $request->programa;

        foreach ($programas as $value) {
            $programaUsuarios = new ProgramaUsuarios();
            $programaUsuarios->usuario_id = $value;
            $programaUsuarios->programa_id = $programaUsuario;
            $programaUsuarios->estado = '1';
            $programaUsuarios->save();

            $usuariosEnProgramas = $this->obtenerUsuariosYProgramas($value, $programaUsuario);

            // Crear un array para llevar un registro de los correos enviados
            $correosEnviados = [];

            foreach ($usuariosEnProgramas as $correo) {
                $email = $correo->email;

                // Verificar si ya se envió un correo a este usuario
                if (!in_array($email, $correosEnviados)) {
                    $nombre = $correo->nombre;
                    $apellido = $correo->apellido;
                    $nombre_programa = $correo->nombre_programa;
                    $dia_lunes = $correo->dia_lunes;
                    $dia_martes = $correo->dia_martes;
                    $dia_miercoles = $correo->dia_miercoles;
                    $dia_jueves = $correo->dia_jueves;
                    $dia_viernes = $correo->dia_viernes;
                    $dia_sabado = $correo->dia_sabado;
                    $dia_domingo = $correo->dia_domingo;
                    $inicio_programa = $correo->inicio_programa;
                    $fin_programa = $correo->fin_programa;

                    $this->enviarCorreo($email, $nombre, $apellido, $nombre_programa, $dia_lunes, $dia_martes, $dia_miercoles, $dia_jueves, $dia_viernes, $dia_sabado, $dia_domingo, $inicio_programa, $fin_programa);

                    // Agregar el correo al array de correos enviados
                    $correosEnviados[] = $email;
                }
            }

        }
        toastr()->success('Locutor asignado correctamente');
        return redirect()->back();
    }

    // Función para extraer el programa, el usuario y las promociones y busca por programa
    public function obtenerUsuariosYProgramas($usuarioId, $programaId)
    {
        $usuariosEnPrograma = DB::table('programa_usuarios as pu')
            ->join('programas as p', 'p.id', '=', 'pu.programa_id')
            ->join('users as u', 'u.id', '=', 'pu.usuario_id')
            ->select('pu.*', 'p.*', 'u.*')
            ->where('u.id', '=', $usuarioId)
            ->where('p.id', '=', $programaId)
            ->get();

        return $usuariosEnPrograma;
    }
    // Función para enviar correos electrónicos
    public function enviarCorreo($email, $nombre, $apellido, $nombre_programa, $dia_lunes, $dia_martes, $dia_miercoles, $dia_jueves, $dia_viernes, $dia_sabado, $dia_domingo, $inicio_programa, $fin_programa)
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
            $omail->setFrom("los40ecuadorsistema@gmail.com", "Asignación al programa '$nombre_programa'");
            $omail->addAddress($email);
            $omail->Subject = "¡Te damos la bienvenida al programa $nombre_programa!";
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
                .green {
                    background-color: #b3ffb3; /* Cambiar al color verde que prefieras */
                }
                .red {
                    background-color: #ff9999; /* Cambiar al color rojo que prefieras */
                }
            </style>
                <p>Hola <strong>$nombre $apellido </strong>fuiste asignad@ al programa <strong>$nombre_programa</strong>  </p>
                <p style='text-align: center;'><strong>Horarios del programa</strong></p>
                <p>Hora de inicio<strong> $inicio_programa</strong> hasta <strong> $fin_programa</strong></p>

                <table border='1'>
                    <tr>
                        <th>Día</th>
                        <th>Disponible</th>
                    </tr>
                    <tr>
                        <td>Lunes</td>
                        <td class='" . ($dia_lunes ? 'green' : 'red') . "'>" . ($dia_lunes ? 'Sí' : 'No') . "</td>
                    </tr>
                    <tr>
                        <td>Martes</td>
                        <td class='" . ($dia_martes ? 'green' : 'red') . "'>" . ($dia_martes ? 'Sí' : 'No') . "</td>
            
                    
                    </tr>
                    <tr>
                        <td>Miércoles</td>
                        <td class='" . ($dia_miercoles ? 'green' : 'red') . "'>" . ($dia_miercoles ? 'Sí' : 'No') . "</td>
            
                        
                    </tr>
                    <tr>
                        <td>Jueves</td>
                        <td class='" . ($dia_jueves ? 'green' : 'red') . "'>" . ($dia_jueves ? 'Sí' : 'No') . "</td>
            
                    </tr>
                    <tr>
                        <td>Viernes</td>
                        <td class='" . ($dia_viernes ? 'green' : 'red') . "'>" . ($dia_viernes ? 'Sí' : 'No') . "</td>

                    </tr>
                    <tr>
                        <td>Sábado</td>
                        <td class='" . ($dia_sabado ? 'green' : 'red') . "'>" . ($dia_sabado ? 'Sí' : 'No') . "</td>
            
                    
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td class='" . ($dia_domingo ? 'green' : 'red') . "'>" . ($dia_domingo ? 'Sí' : 'No') . "</td>
            
                    </tr>
                </table>";
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
        $programas = ProgramaUsuarios::findOrFail($id);
        $programas->delete();
        return response(['status' => 'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
