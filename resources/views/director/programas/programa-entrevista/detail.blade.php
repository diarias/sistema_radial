@extends('director.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Información de Entrevista</h1>
    </div>







    <div class="row">
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">


                <div class="card-body">


                    <img src="{{asset($entrevistas->imagen)}}" alt="" width="100%">





                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">


                <div class="card-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <label for=""><strong>Nombre de entrevistado:</strong> </label>
                            <p>{{$entrevistas->nombre_entrevistado}}</p>
                        </div>
                        <div class="col-lg-6">
                            <label for=""><strong>Usuario en Instagram: <a
                                        href="{{$entrevistas->usuario_instagram}}"
                                        class="btn" target="_blank"><i class="bi-instagram"
                                            style="font-size: 1rem; color: rgb(173, 68, 7);"></i></a></strong>
                            </label>
                            <p>{{$entrevistas->usuario_instagram}}</p>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <label for=""><strong>Marca o evento en instagram: <a
                                            href="{{$entrevistas->evento_instagram}}"
                                            class="btn" target="_blank"><i class="bi-instagram"
                                                style="font-size: 1rem; color: rgb(173, 68, 7);"></i></a></strong>
                                </label>
                                <p>{{$entrevistas->evento_instagram}}
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <label for=""><strong>Tema de evento:</strong> </label>
                                <p>{{$entrevistas->tema}}</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <label for=""><strong>Fecha:</strong> </label>
                                <p>{{$entrevistas->fecha}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label for=""><strong>Hora:</strong> </label>
                                <p>{{$entrevistas->hora}}</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <label for=""><strong>Modalidad:</strong> </label>
                                <p>{{$entrevistas->modalidad}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label for=""><strong>Boletin de prensa:</strong> </label>

                                <p>{!!$entrevistas->boletin!!}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label for=""><strong>Programa:</strong> </label>
                                <p>{{$prog->nombre_programa}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 " style="margin-top: 5%;">
                                <a href="{{route('director.entrevistas.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 120%;"><i
                                        class="bi bi-arrow-return-left"></i> Retroceder</a>
                            </div>
                        </div>

                    </div>





                </div>
            </div>
        </div>


    </div>




</section>
@endsection