<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Trait\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{


    use ImageUploadTrait;
    public function index()
    {
        return view('director.perfil.index');
    }

    public function updatePerfil(Request $request)
    {

        $request->validate([
            'imagen_perfil' => ['image', 'max:2048'],
        ]);
        $user = Auth::user();
        $imagenruta = $this->updateImage($request, 'imagen_perfil', 'uploads', $user->foto);

        $user->foto = empty(!$imagenruta) ? $imagenruta : $user->foto;
        $user->save();
        toastr()->success('Foto Guardada');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $request->user()->update([
            'password'=> bcrypt($request->password)
        ]);
        toastr()->success('Contraseña Actualizada');
        return redirect()->back();
    }
}
