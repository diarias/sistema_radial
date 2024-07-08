
@extends('director.layouts.master')
@section('content')




<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
            <div class="section-header">
                <h1>Crear Mención</h1>
            </div>
        </div>

    </div>



    <div class="row">

        <div class="card">


            <div class="card-body">



                <form class="row g-3" action="{{route('director.menciones.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente" name="cliente">
                    </div>
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>




                    <div class="col-md-6">
                        <label for="inicio_mencion" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="inicio_mencion"
                            name="inicio_mencion">
                    </div>
                    <div class="col-md-6">
                        <label for="fin_mencion" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fin_mencion" name="fin_mencion">
                    </div>

                    <div class="col-md-12">
                        <label for="frecuencia" class="form-label">Frecuenia de Reproducciòn</label>
                        <select class="form-select" aria-label="Default select example" name="frecuencia">

                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="3">4</option>
                            <option value="3">5</option>
                        </select>
                    </div>
                
                    <div class="col-md-12">

                        <label for="texto_mencion">Ingresar Mención</label>
                        <textarea class="form-control" id="texto_mencion" rows="50" name="mencion"></textarea>

                    </div>




                    <div class="row">
                        <div class="col-md-4" style="margin-top: 2%">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                style="font-size: 1rem"><i class="bi bi-floppy2-fill" style="font-size: 1rem"></i>
                                Guardar</button>
                        </div>
                        <div class="col-md-4" style="margin-top: 2%">
                            <a type="submit" href="{{ route('director.menciones.index') }}"
                                class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i
                                    class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
                                Regresar</a>
                        </div>
                    </div>
                </form>







            </div>

        </div>

    </div>

</section>


@endsection