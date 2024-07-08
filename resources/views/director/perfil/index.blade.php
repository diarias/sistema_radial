@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-body">
                <div class="row mt-sm-4 ">
                    <form action="{{route('director.password.update')}}" method="POST" >
                        @csrf
                        <div class="form-group col-md-6 col-12" style="margin-top: 3%;">

                            <label>Actual contraseña:</label>
                            <input type="password" class="form-control"  name="current_password" >

                            <label>Nueva contraseña:</label>
                            <input type="password" class="form-control"  name="password" >

                            <label>Repetir contraseña:</label>
                            <input type="password" class="form-control"  name="password_confirmation" >

                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto">

                                    <button type="submit" class="btn btn-primary "
                                        style="font-size: 20px; margin-bottom: 5%;">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action=" {{ route('director.perfil.update') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-12 col-lg-12 ">
                            <div class="card profile-widget">
                                <div class="profile-widget-description">
                                    <div class="row" style="margin-top: 2%;">
                                        <div class="row">
                                            <div class="profile-widget-name">
                                                <h2>Editar Perfil</h2>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <center> <img src="{{ asset(Auth::user()->foto) }} " alt=""
                                                        width="29%" style="border-radius: 20%; justify-content: center;"
                                                        id="imgPreview">
                                                </center>
                                                <br>
                                                <label>Usuario:</label>
                                                <input type="file" class="form-control"
                                                    accept="image/png,image/jpg,image/jpeg" name="imagen_perfil"
                                                    onchange="previewImage(event, '#imgPreview')">



                                            </div>



                                        </div>


                                        <div class="form-group col-md-6 col-12">
                                            <label>Nombre Artistico:</label>

                                            <p>{{ Auth::user()->nom_artis }}</p>

                                        </div>









                                        <div class="row">
                                            <div class="profile-widget-name">
                                                <hr>
                                                Locutor (información de cada uno de los Locutores)
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Nombre:</label>
                                                <p>{{ Auth::user()->nombre }}</p>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Apellido:</label>
                                                <p>{{ Auth::user()->apellido }}</p>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-6 col-12">
                                                <label>Telefono:</label>
                                                <p>{{ Auth::user()->telefono }}</p>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Fecha de nacimiento:</label>
                                                <p>{{ Auth::user()->fecha_naci }}</p>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-6 col-12">
                                                <label>Sexo:</label>
                                                <p>{{ Auth::user()->sexo }}</p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Correo:</label>
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Nacionalidad:</label>
                                                <p>{{ Auth::user()->nacionalidad }}</p>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Pais:</label>
                                                <p>{{ Auth::user()->pais_resi }}</p>
                                            </div>

                                            <div class="form-group col-md-6 col-12">
                                                <label>Ciudad:</label>
                                                <p>{{ Auth::user()->ciudad_resi }}</p>
                                            </div>

                                        </div>

                                        <div class="row">


                                            <div class="form-group col-md-12 col-12">
                                                <label>Dirección:</label>
                                                <p>{{ Auth::user()->direccion }}</p>
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
                                                    <p>{{ Auth::user()->facebook }}</p>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label><i class="bi-twitter"
                                                            style="font-size: 1rem; color: cornflowerblue;"></i>
                                                        Twitter:</label>
                                                    <p>{{ Auth::user()->twitter }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label><i class="bi-instagram"
                                                            style="font-size: 1rem; color: rgb(173, 68, 7);"></i>
                                                        Instagram:</label>
                                                    <p>{{ Auth::user()->instagram }}</p>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label><i class="bi-youtube"
                                                            style="font-size: 1rem; color: rgb(250, 4, 4);"></i>
                                                        Youtube:</label>
                                                    <p>{{ Auth::user()->youtube }}</p>
                                                </div>
                                            </div>



                                            <div class="profile-widget-name">
                                                <hr>
                                                Biografia de locutor:
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label> Biografía:</label>
                                                    <p>{{ Auth::user()->biografia }}</p>
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
                                                    <p>{{ Auth::user()->talla_cami }}</p>
                                                </div>

                                            </div>






                                            <div class="row">
                                                <div class="d-grid gap-2 col-6 mx-auto">

                                                    <button type="submit" class="btn btn-primary "
                                                        style="font-size: 20px; margin-bottom: 5%;">Guardar</button>


                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer text-center">

                                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                                <i class="fab fa-github"></i>
                                            </a>
                                            <a href="#" class="btn btn-social-icon btn-instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>

                    </form>

                </div>
            </div>


        </div>



    </section>
@endsection
