@extends('director.layouts.master')
@section('content')
    <section class="section">


        <form action="{{ route('director.usuario.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section-header">
                <h1>Editar usuario</h1>

            </div>
            <div class="section-body">




                <div class="row mt-sm-4 ">
                    <div class="col-12 col-md-12 col-lg-12 ">
                        <div class="card profile-widget">


                            <div class="profile-widget-description">

                                <div class="row" style="margin-top: 2%;">

                                    <div class="row">

                                        <div class="profile-widget-name">
                                            Configuración de sistema
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <center> <img src="{{ asset($usuario->foto) }}" alt="" width="29%"
                                                    style="border-radius: 20%; justify-content: center;" id="imgPreview">
                                            </center>
                                            <br>



                                        </div>


                                        <div class="form-group col-md-6 col-12" style="margin-top: 3%;">




                                            <label><strong>Rol:</strong></label>
                                            <p>{{ $usuario->role }}</p>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="profile-widget-name">
                                        <hr>
                                        Locutor (información de cada uno de los Locutores)
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Nombres:</strong></label>
                                        <p>{{ $usuario->nombre }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Apellidos:</strong></label>
                                        <p>{{ $usuario->apellido }}</p>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Telefono:</strong></label>
                                        <p>{{ $usuario->telefono }}</p>

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Fecha de nacimiento:</strong></label>
                                        <p>{{ $usuario->fecha_naci }}</p>

                                    </div>


                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Sexo:</strong></label>
                                        <p>{{ $usuario->sexo }}</p>

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Nombre Artistico:</strong></label>
                                        <p>{{ $usuario->nom_artis }}</p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Correo:</strong></label>
                                        <p>{{ $usuario->email }}</p>

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Nacionalidad:</strong></label>
                                        <p>{{ $usuario->nacionalidad }}</p>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Pais:</strong></label>
                                        <p>{{ $usuario->pais_resi }}</p>

                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label><strong>Ciudad:</strong></label>
                                        <p>{{ $usuario->ciudad_resi }}</p>

                                    </div>

                                </div>

                                <div class="row">


                                    <div class="form-group col-md-12 col-12">
                                        <label><strong>Dirección:</strong></label>
                                        <p>{{ $usuario->direccion }}</p>
                                    </div>






                                    <div class="profile-widget-name">
                                        <hr>
                                        Redes Sociales
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label> <i class="bi-facebook"
                                                    style="font-size: 1rem; color: cornflowerblue;"></i>
                                                <strong>Facebook:</strong></label>
                                            <p>{{ $usuario->facebook }}</p>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-twitter"
                                                    style="font-size: 1rem; color: cornflowerblue;"></i>
                                                <strong>Twitter:</strong></label>
                                            <p>{{ $usuario->twitter }}</p>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-instagram"
                                                    style="font-size: 1rem; color: rgb(173, 68, 7);"></i>
                                                <strong>Instagram:</strong></label>
                                            <p>{{ $usuario->instagram }}</p>

                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-youtube"
                                                    style="font-size: 1rem; color: rgb(250, 4, 4);"></i>
                                                <strong>Youtube:</strong></label>
                                            <p>{{ $usuario->youtube }}</p>

                                        </div>
                                    </div>



                                    <div class="profile-widget-name">
                                        <hr>
                                        <strong>Biografia de locutor:</strong>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label><strong>Biografía:</strong> </label>
                                            <p>{{ $usuario->biografia }}</p>
                                        </div>

                                    </div>






                                    <div class="profile-widget-name">
                                        <hr>
                                        Camiseta:
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6 col-12" style="text-align: center;">
                                            <img src="{{ asset('backend/assets/img/camiseta-los40-retro.jpg') }} "
                                                alt="" width="40%">

                                        </div>


                                        <div class="form-group col-md-6 col-12">
                                            <label> Talla:</label>

                                            <p>{{ $usuario->talla_cami }}</p>


                                        </div>

                                    </div>






                                    <div class="row">
                                       
                                        <div class="col-md-4" style="margin-top: 4%">
                                            <a type="submit" href="{{ route('director.usuario.index') }}"
                                                class="btn btn-info btn-lg btn-block"
                                                style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left"
                                                    style="font-size: 1rem; color:white"></i>
                                                Regresar</a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>




                    </div>
                </div>

        </form>
    </section>
@endsection
<script>
    function previewImage(event, querySelector) {

        //Recuperamos el input que desencadeno la acción
        const input = event.target;

        //Recuperamos la etiqueta img donde cargaremos la imagen
        $imgPreview = document.querySelector(querySelector);

        // Verificamos si existe una imagen seleccionada
        if (!input.files.length) return

        //Recuperamos el archivo subido
        file = input.files[0];

        //Creamos la url
        objectURL = URL.createObjectURL(file);

        //Modificamos el atributo src de la etiqueta img
        $imgPreview.src = objectURL;

    }
</script>
