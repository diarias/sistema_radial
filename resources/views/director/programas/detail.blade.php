@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                <div class="section-header">
                    <h1>Detalle del Programa</h1>
                </div>
            </div>

        </div>



        <div class="row">

            <div class="card">


                <div class="card-body">



                    <form action="">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre_programa" class="form-label"><strong>Nombre:</strong></label>
                                <p>{{ $programas->nombre_programa }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inicio_mencion" class="form-label"><strong>Horario Inicio</strong></label>
                                <p>{{ $programas->inicio_programa }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="fin_mencion" class="form-label"><strong>Horario Fin</strong></label>

                                <p>{{ $programas->fin_programa }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <label for="texto_mencion"><strong>Descripciòn de Programa (200 palabras
                                        máximo)</strong></label>
                                <p>{{ $programas->descripcion_programa }}</p>

                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:2%">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox" name="dia_lunes"
                                    {{ $programas->dia_lunes == 'on' ? 'checked' : '' }} readonly
                                    onmousedown="return false;">
                                <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox" name="dia_martes"
                                    {{ $programas->dia_martes == 'on' ? 'checked' : '' }} readonly
                                    onmousedown="return false;">
                                <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox"
                                    name="dia_miercoles"{{ $programas->dia_miercoles == 'on' ? 'checked' : '' }} readonly
                                    onmousedown="return false;">
                                <label class="form-check-label" for="inlineCheckbox3">Miércoles</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox" name="dia_jueves"
                                    {{ $programas->dia_jueves == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3">Jueves</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox"
                                    name="dia_viernes"{{ $programas->dia_viernes == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3">Viernes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox" name="dia_sabado"
                                    {{ $programas->dia_sabado == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3">Sábado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled='true' type="checkbox" name="dia_domingo"
                                    {{ $programas->dia_domingo == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3">Domingo</label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top: 2%">
                                <label for="estado" class="form-label"><strong>Estado</strong></label>
                                <p>{{ $programas->estado == 1 ? 'Activo' : 'Inactivo' }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 " style="margin-top: 0%; margin-bottom: 2%">
                                <a href="{{ route('director.programa.index') }}" class="btn btn-info btn-lg btn-block"
                                    style="font-size: 120%;"><i class="bi bi-arrow-return-left"></i> Retroceder</a>
                            </div>
                        </div>
                    </form>







                </div>

            </div>

        </div>

    </section>
@endsection
