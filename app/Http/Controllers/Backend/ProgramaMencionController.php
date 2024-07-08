<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProgramaMencionesDataTable;
use App\Http\Controllers\Controller;
use App\Models\CalendarioMenciones;
use App\Models\Menciones;
use App\Models\ProgramaMenciones;
use App\Models\ProgramaPromociones;
use App\Models\Programas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PHPMailer\PHPMailer\PHPMailer;

class ProgramaMencionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProgramaMencionesDataTable $dataTables, Request $request)
    {

        $programas = Programas::all();
        $menciones = Menciones::findOrFail($request->programa);
        return $dataTables->render('director.programas.programa-mencion.index', compact('programas', 'menciones'));
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
        //dd($request->all());
        $request->validate([
            'programa' => ['required'],
            'programa.*' => [
                'distinct', // Asegura que no haya valores duplicados en el array
                Rule::unique('programa_menciones', 'programa_id')->where(function ($query) use ($request) {
                    return $query->where('mencion_id', $request->mencion_programa);
                }),
            ],
            'mencion_programa' => ['required']
        ]);



        $idmencion = $request->mencion_programa;
        $idprogramas = $request->programa;
        // Obtener información sobre la promoción
        $mencion = Menciones::find($idmencion);
        $fechaInicioPromocion = $mencion->fecha_ini;
        $fechaFinPromocion = $mencion->fecha_fin;
        $frecuencia = $mencion->frecuencia;

        //  dd($fechaInicioPromocion ,$fechaFinPromocion, $frecuencia);
        // Obtener un array de fechas entre la fecha de inicio y la fecha de fin
        $fechasMenciones = $this->getFechasMencion($fechaInicioPromocion, $fechaFinPromocion);
        //dd($fechaPromocion);

        foreach ($idprogramas as $value) {
            $mencionprograma = new ProgramaMenciones();
            $mencionprograma->mencion_id = $idmencion;
            $mencionprograma->programa_id = $value;
            $mencionprograma->estado = '1';
            $mencionprograma->save();
            //guarda en la tabla calendario promociones
            foreach ($fechasMenciones as $fecha) {

                $cont = 0;
                while ($cont < $frecuencia) {
                    $calendario = new CalendarioMenciones();
                    $calendario->mencion_id = $idmencion;
                    $calendario->programa_id = $value;
                    $calendario->fecha = $fecha;
                    $calendario->estado = '1';


                    $cont++;
                    // print("Fecha: $fecha - Contador: $cont\n"); // Para propósitos de depuración
                    $calendario->save();
                }
            }
            //Parte de correo electronico busca la mencion y busca a los usuarios anclados a ese programa y envia a correo electronico 
            // dd($value, $promocionPrograma);
            $usuariosEnProgramas = $this->obtenerUsuariosYProgramas($value, $idmencion);


            foreach ($usuariosEnProgramas as $usuarioEnPrograma) {
                $email = $usuarioEnPrograma->email;
                $nombre = $usuarioEnPrograma->nombre;
                $apellido = $usuarioEnPrograma->apellido;
                $nombre_programa = $usuarioEnPrograma->nombre_programa;
                $titulo = $usuarioEnPrograma->titulo;
                $fecha_ini = $usuarioEnPrograma->fecha_ini;
                $fecha_fin = $usuarioEnPrograma->fecha_fin;
                $frecuencia = $usuarioEnPrograma->frecuencia;
                $mencion = $usuarioEnPrograma->mencion;
                // Llama a la función para enviar el correo
                $this->enviarCorreo($email, $nombre, $apellido, $nombre_programa, $titulo, $fecha_ini, $fecha_fin, $frecuencia, $mencion);
            }
        }
        toastr()->success('Programas asignados correctamente');
        return redirect()->back();
    }
    // Función para obtener un array de fechas entre la fecha de inicio y la fecha de fin
    public function getFechasMencion($fechaInicio, $fechaFin)
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
    //Funcion para extrar el programa el usuario promociones y busca por programa
    public function obtenerUsuariosYProgramas($value, $idmencion)
    {
        $resultado = Programas::join('programa_menciones as pm', 'programas.id', '=', 'pm.programa_id')
            ->join('menciones as m', 'm.id', '=', 'pm.mencion_id')
            ->join('programa_usuarios as pu', 'pu.programa_id', '=', 'programas.id')
            ->join('users as u', 'u.id', '=', 'pu.usuario_id')
            ->select('programas.*', 'm.*', 'pm.*', 'u.*', 'pu.*')
            ->where('programas.id', '=', $value)
            ->where('m.id', '=', $idmencion)
            ->get();
        return $resultado;
    }
    // Función para enviar correos electrónicos
    public function enviarCorreo($email, $nombre, $apellido, $nombre_programa, $titulo, $fecha_ini, $fecha_fin, $frecuencia, $mencion)
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
            $omail->setFrom("los40ecuadorsistema@gmail.com", "Se creo nueva menciòn '$titulo'");
            $omail->addAddress($email);
            $omail->Subject = "¡Nueva menciòn: $titulo!";
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
                    <p>Tienes una nueva menciòn asignada con tiutlo <strong>$titulo</strong>, en el programa <strong>$nombre_programa</strong> acontinuación te muestro
                        los detalles:</p>
                
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del programa</th>
                                <th>Titulo de promo </th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Frecuencia por programa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$nombre_programa</td>
                                <td>$titulo</td>
                                <td>$fecha_ini</td>
                                <td>$fecha_fin</td>
                                <td>$frecuencia</td>
                            </tr>
                
                        </tbody>
                    </table>
                <h2>Menciòn</h2>
                <br>
                <h4>$mencion</h4>
                
                <p>Si quieres saber más información sobre la menciòn visita el sistema: www.los40principales.com </p> ";
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
        $menciones_programa = ProgramaMenciones::findOrFail($id);
        $menciones_programa->delete();
        return response(['status' => 'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
