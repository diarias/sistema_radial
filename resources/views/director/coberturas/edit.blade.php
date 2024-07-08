@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Editar Cobertura</h1>
        </div>





        <form action="{{ route('director.coberturas.update', $coberturas->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="titulo" value="{{$coberturas->titulo}}">

                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Fecha:</strong>
                                    </label>
                                    <input type="date" class="form-control" name="fecha" value="{{$coberturas->fecha}}">

                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Hora:</strong>
                                    </label>
                                    <input type="time" class="form-control" name="hora" value="{{$coberturas->hora}}">

                                </div>

                                <div class="col-lg-6">
                                    <label for=""><strong>Descripción:</strong>
                                    </label>
                                    <textarea name="descripcion" id="" cols="30" rows="5" class="form-control" style="height: auto;">{{$coberturas->descripcion}}</textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Logistica:</strong>
                                    </label>
                                    <textarea name="logistica" id="" cols="30" rows="5" class="form-control" style="height: auto;">{{$coberturas->logistica}}</textarea>
                                </div>




                                <div class="col-md-12" style="margin-top: 2%">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block" style="font-size: 2ch"><i
                                            class="bi bi-floppy2-fill"></i>
                                        Editar</button>
                                </div>

                            </div>





                        </div>
                    </div>
                </div>


            </div>

        </form>


    </section>
@endsection
