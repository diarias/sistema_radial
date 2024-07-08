<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsuariosDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProgramaUsuarios;
use App\Models\User;
use App\Trait\ImageUploadTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait;
    public function index(UsuariosDataTable $dataTable)
    {
        return  $dataTable->render('director.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'imagen_perfil' => ['image', 'required', 'max:2000'],

            'password' => ['required'],
            'id_rol' => ['required'],
            'nombre' => ['required', 'max:200'],
            'apellido' => ['required', 'max:200'],
            'telefono' => ['required', 'max:10'],
            'fecha_nacimiento' => ['required'],
            'sexo' => ['required'],
            'nombre_artistico' => ['required', 'max:200'],
            'correo' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'nacionalidad' => ['required', 'max:100'],
            'pais' => ['required', 'max:100'],
            'ciudad' => ['required', 'max:100'],
            'direccion' => ['required', 'max:500'],
            'facebook' => ['required'],
            'twitter' => ['required'],
            'instagram' => ['required'],
            'youtube' => ['required'],
            'biografia' => ['required', 'max:250'],
            'talla' => ['required']
        ]);

        $imagen_perfil = $this->uploadImage($request, 'imagen_perfil', 'uploads');

        $perfil = new User();

        $perfil->foto = $imagen_perfil;
        $perfil->usuario = $request->nombre;
        $perfil->password = $request->password;
        // $perfil->id_rol = $request->id_rol;
        $perfil->role = $request->id_rol;
        $perfil->nombre = $request->nombre;
        $perfil->apellido = $request->apellido;
        $perfil->telefono = $request->telefono;
        $perfil->fecha_naci = $request->fecha_nacimiento;
        $perfil->sexo = $request->sexo;
        $perfil->nom_artis = $request->nombre_artistico;
        $perfil->email = $request->correo;
        $perfil->nacionalidad = $request->nacionalidad;
        $perfil->pais_resi = $request->pais;
        $perfil->ciudad_resi = $request->ciudad;
        $perfil->direccion = $request->direccion;
        $perfil->facebook = $request->facebook;
        $perfil->twitter = $request->twitter;
        $perfil->instagram = $request->instagram;
        $perfil->youtube = $request->youtube;
        $perfil->biografia = $request->biografia;
        $perfil->talla_cami = $request->talla;
        $perfil->estado = '1';


        $perfil->save();


        toastr()->success('Perfil Guardado');

        $this->enviarCorreo($perfil->email, $perfil->nombre, $perfil->password, $perfil->apellido,  'email', 'nombre', 'password', 'apellido');


        return redirect()->route('director.usuario.index');
    }
    // Función para enviar correos electrónicos
    public function enviarCorreo($email, $nombre, $password, $apellido)
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
            $omail->CharSet = 'UTF-8';
            $omail->isHTML(true); // Indicar que el contenido es HTML
            // Configurar el contenido del correo
            $omail->setFrom("los40ecuadorsistema@gmail.com", "Creación de cuenta");
            $omail->addAddress($email);
            $omail->Subject = "¡Creacón de cuenta Los 40 Ecuador!";




            $tableContent = "Hola <strong>$nombre $apellido</strong>,\n\nBienvenid@ a nuestra familia <strong> Los 40 Ecuador</strong> tu contraseña temporal es:<strong> Los40,123456</strong> \n\n <strong>¡No olvides cambiar tu contraseña al ingresar al sistema!</strong>\n\n Ingresa al link para acceder al sistema: www.player.los40.com.ec/";
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
        $usuario = User::findOrFail($id);
        return view('director.usuarios.detail', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('director.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $request->validate([
            'imagen_perfil' => ['nullable', 'image', 'max:2000'],

            'password' => ['required'],
            'id_rol' => ['required'],
            'nombre' => ['required', 'max:200'],
            'apellido' => ['required', 'max:200'],
            'telefono' => ['required', 'max:10'],
            'fecha_nacimiento' => ['required'],
            'sexo' => ['required'],
            'nombre_artistico' => ['required', 'max:200'],
            // 'correo' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'nacionalidad' => ['required', 'max:100'],
            'pais' => ['required', 'max:100'],
            'ciudad' => ['required', 'max:100'],
            'direccion' => ['required', 'max:500'],
            'facebook' => ['required'],
            'twitter' => ['required'],
            'instagram' => ['required'],
            'youtube' => ['required'],
            'biografia' => ['required', 'max:250'],
            'talla' => ['required']
        ]);
        $perfil = User::findOrFail($id);
        $imagenruta = $this->updateImage($request, 'imagen_perfil', 'uploads', $perfil->foto);

        $perfil->foto = empty(!$imagenruta) ? $imagenruta : $perfil->foto;;
        $perfil->usuario = $request->nombre;
        $perfil->password = $request->password;
        // $perfil->id_rol = $request->id_rol;
        $perfil->role = $request->id_rol;
        $perfil->nombre = $request->nombre;
        $perfil->apellido = $request->apellido;
        $perfil->telefono = $request->telefono;
        $perfil->fecha_naci = $request->fecha_nacimiento;
        $perfil->sexo = $request->sexo;
        $perfil->nom_artis = $request->nombre_artistico;
        $perfil->email = $request->correo;
        $perfil->nacionalidad = $request->nacionalidad;
        $perfil->pais_resi = $request->pais;
        $perfil->ciudad_resi = $request->ciudad;
        $perfil->direccion = $request->direccion;
        $perfil->facebook = $request->facebook;
        $perfil->twitter = $request->twitter;
        $perfil->instagram = $request->instagram;
        $perfil->youtube = $request->youtube;
        $perfil->biografia = $request->biografia;
        $perfil->talla_cami = $request->talla;
        $perfil->estado = '1';
        $perfil->save();


        toastr()->success('Perfil Guardado');
        return redirect()->route('director.usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        // Verificar si el usuario está asignado a algún programa
        $asignaciones = ProgramaUsuarios::where('usuario_id', $usuario->id)->count();

        if ($asignaciones > 0) {
            return response(['status' => 'error', 'message' => 'El usuario está asignado a un programa. No se puede borrar.']);
        }

        // Si no está asignado a ningún programa, proceder con el borrado
        $usuario->delete();

        return response(['status' => 'success', 'message' => 'Borrado Satisfactoriamente']);
    }
}
