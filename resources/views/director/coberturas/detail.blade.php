@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Información de Cobertura</h1>
        </div>





        <form action="" method="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">


                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">


                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="" style="margin: 0.2rem 0rem 1.3rem 0rem;"><strong>Titulo:</strong>
                                    </label>
                                    <p>{{ $coberturas->titulo }}</p>

                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Fecha:</strong>
                                    </label>
                                    <p>{{ $coberturas->fecha }}</p>

                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Hora:</strong>
                                    </label>
                                    <p>{{ $coberturas->hora }}</p>

                                </div>

                                <div class="col-lg-6">
                                    <label for=""><strong>Descripción:</strong>
                                    </label>
                                    <p>{{ $coberturas->descripcion }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Logistica:</strong>
                                    </label>
                                    <p>{{ $coberturas->logistica }}</p>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4 " style="margin-top: 5%;">
                                        <a href="{{route('director.coberturas.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 120%;"><i
                                                class="bi bi-arrow-return-left"></i> Retroceder</a>
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
