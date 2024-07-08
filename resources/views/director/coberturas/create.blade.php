@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Crear Cobertura</h1>
        </div>






        <form action="{{ route('director.coberturas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">


                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">


                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="" style="margin: 0.2rem 0rem 1.3rem 0rem;"><strong>Titulo:</strong>
                                    </label>
                                    <input type="text" class="form-control" name="titulo">

                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Fecha:</strong>
                                    </label>
                                    <input type="date" class="form-control" name="fecha">

                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Hora:</strong>
                                    </label>
                                    <input type="time" class="form-control" name="hora">

                                </div>

                                <div class="col-lg-6">
                                    <label for=""><strong>Descripción:</strong>
                                    </label>
                                    <textarea name="descripcion" id="" cols="30" rows="5" class="form-control" style="height: auto;"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Logistica:</strong>
                                    </label>
                                    <textarea name="logistica" id="" cols="30" rows="5" class="form-control" style="height: auto;"></textarea>
                                </div>




                                <div class="row">
                        <div class="col-md-4" style="margin-top: 2%">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                style="font-size: 1rem"><i class="bi bi-floppy2-fill" style="font-size: 1rem"></i>
                                Guardar</button>
                        </div>
                        <div class="col-md-4" style="margin-top: 2%">
                            <a type="submit" href="{{ route('director.coberturas.index') }}"
                                class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i
                                    class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
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
