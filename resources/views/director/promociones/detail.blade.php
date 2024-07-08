

@extends('director.layouts.master')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
            <div class="section-header">
                <h1>Información de Promocion</h1>
            </div>
        </div>

    </div>



    <div class="row">

        <div class="card">


            <div class="card-body">



                <form class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="cliente" class="form-label"><strong>Titulo de promociones:</strong></label>
                        <p>{{ $promociones->titulo }}</p>
                    </div>
                    <div class="col-md-6">
                        <label for="inicio_mencion" class="form-label"><strong>Fecha inicio</strong></label>
                        <p>{{ $promociones->fecha_inicio }}</p>
                    </div>
                    <div class="col-md-6">
                        <label for="fin_mencion" class="form-label"><strong>Fecha Fin</strong></label>
                        <p>{{$promociones->fecha_fin }}</p>
                    </div>
                    <div class="col-md-12">
                        <label for="cliente" class="form-label"><strong>Descripciòn de promociòn:</strong></label>
                        <p>{{ $promociones->descripcion }}</p>
                    </div>






                    <div class="col-md-6">


                        <center> <img src="{{asset($promociones->imagen)}}" alt="Imagen de promociòn"
                                width="50%" id="imgPreview"></center>
                        <label for="" class="form-label" style="margin-top: 2%;"><strong> Imagen de
                            promociòn</strong> </label>

                    </div>

                    <div class="col-md-6">

                        <center> <video width="90%" src="{{ asset($promociones->video) }}" id="video_player" controls>
                            </video></center>
                        <br>
                        <label for="" class="form-label" style="margin-top: 2%;"><strong> Cargar video de
                            promociòn </strong></label>


                    </div>



                    <hr>

                    <div class="col-md-12">
                        <div class="body-redes">
                            <section class="botones-redes">
                                <a href="https://www.facebook.com/Los40Ecuador" target="_blank"
                                    class="fa fa-facebook"><i class="bi bi-facebook"></i></a>
                                <a href="https://twitter.com/Los40?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                                    target="_blank" class="fa fa-twitter"><i class="bi bi-twitter"></i></a>
                                <a href="https://www.instagram.com/los40ecuador/?hl=es" target="_blank"
                                    class="fa fa-instagram"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.tiktok.com/@los40ecuador" target="_blank" class="fa fa-facebook"><i
                                        class="bi bi-tiktok"></i></a>
                            </section>
                        </div>
                    </div>



                    <div class="col-md-12" style="margin-top: 2%">           
                        <div class="row">
                          
                            <div class="col-md-4" style="margin-top: 4%">
                                <a type="submit" href="{{route('director.promociones.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
                                    Regresar</a>
                            </div>
                        </div>
                    </div>
                </form>







            </div>

        </div>

    </div>

</section>

@endsection