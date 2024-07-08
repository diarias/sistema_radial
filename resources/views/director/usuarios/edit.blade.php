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
                                            <center> <img src="{{asset($usuario->foto)}}"
                                                    alt="" width="29%"
                                                    style="border-radius: 20%; justify-content: center;" id="imgPreview">
                                            </center>
                                            <br>
                                           
                                            <input type="file" class="form-control" accept="image/png,image/jpg,image/jpeg" name="imagen_perfil"  onchange="previewImage(event, '#imgPreview')">



                                        </div>


                                        <div class="form-group col-md-6 col-12" style="margin-top: 3%;">



                                            <label>Contraseña:</label>
                                            <input type="Password" class="form-control" value="{{$usuario->password}}" name="password">

                                            <label>Rol:</label>
                                            <select class="form-select" aria-label="Default select example" name="id_rol">
                                                <option value="{{$usuario->role}}" selected>{{$usuario->role}}</option>
                                                <option value="director">Dirección</option>
                                                <option value="coordinador">Coordinador</option>
                                                <option value="productor">Productor</option>
                                                <option value="locutor">Locutor</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="profile-widget-name">
                                        <hr>
                                        Locutor (información de cada uno de los Locutores)
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nombres:</label>
                                        <input type="text" class="form-control" value="{{$usuario->nombre}}" required=""
                                            name="nombre">
                                        <div class="invalid-feedback">
                                            Solo puede ingresar letras.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Apellidos:</label>
                                        <input type="text" class="form-control" value="{{$usuario->apellido}}" required=""
                                            name="apellido">
                                        <div class="invalid-feedback">
                                            Solo puede ingresar letras
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label>Telefono:</label>
                                        <input type="number" class="form-control" value="{{$usuario->telefono}}" required=""
                                            name="telefono">
                                        <div class="invalid-feedback">
                                            Solo puede ingresar letras
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Fecha de nacimiento:</label>
                                        <input type="date" class="form-control" value="{{$usuario->fecha_naci}}" required=""
                                            name="fecha_nacimiento">
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label>Sexo:</label>
                                        <input type="text" class="form-control" value="{{$usuario->sexo}}" required=""
                                            name="sexo">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nombre Artistico:</label>
                                        <input class="form-control" type="text" id="alias" name="nombre_artistico" value="{{$usuario->nom_artis}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Correo:</label>
                                        <input type="email" class="form-control" value="{{$usuario->email}}"
                                            required="" name="correo">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nacionalidad:</label>
                                        <input type="text" class="form-control" value="{{$usuario->nacionalidad}}" required=""
                                            name="nacionalidad">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Pais:</label>
                                        <input type="text" class="form-control" value="{{$usuario->pais_resi}}" required=""
                                            name="pais">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Ciudad:</label>
                                        <input class="form-control" type="text" value="{{$usuario->ciudad_resi}}" name="ciudad">
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="form-group col-md-12 col-12">
                                        <label>Dirección:</label>
                                        <textarea name="direccion" id="" cols="30" rows="10" class="form-control">{{$usuario->direccion}}</textarea>
                                    </div>






                                    <div class="profile-widget-name">
                                        <hr>
                                        Redes Sociales
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label> <i class="bi-facebook"
                                                    style="font-size: 1rem; color: cornflowerblue;"></i>
                                                Facebook:</label>
                                            <input type="text" class="form-control" value="{{$usuario->facebook}}"
                                                required="" name="facebook">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-twitter"
                                                    style="font-size: 1rem; color: cornflowerblue;"></i>
                                                Twitter:</label>
                                            <input type="text" class="form-control" value="{{$usuario->twitter}}"
                                                required="" name="twitter">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-instagram"
                                                    style="font-size: 1rem; color: rgb(173, 68, 7);"></i>
                                                Instagram:</label>
                                            <input type="text" class="form-control" value="{{$usuario->instagram}}"
                                                required="" name="instagram">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-youtube"
                                                    style="font-size: 1rem; color: rgb(250, 4, 4);"></i>
                                                Youtube:</label>
                                            <input type="text" class="form-control" value="{{$usuario->youtube}}"
                                                required="" name="youtube">
                                        </div>
                                    </div>



                                    <div class="profile-widget-name">
                                        <hr>
                                        Biografia de locutor:
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label> Biografía:</label>
                                            <textarea class="form-control" name="biografia" id="" cols="60" rows="40">{{$usuario->biografia}}</textarea>
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
                                            <select class="form-select" aria-label="Default select example"
                                                name="talla">
                                                <option value="{{$usuario->talla_cami}}" selected>{{$usuario->talla_cami}}</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>

                                    </div>






                                    <div class="row">
                                        <div class="col-md-4" style="margin-top: 4%">
                                            <button type="submit" class="btn btn-warning btn-lg btn-block" style="font-size: 1rem"><i class="bi bi-pencil-square"></i>
                                            Editar</button>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 4%">
                                            <a type="submit" href="{{route('director.usuario.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
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
