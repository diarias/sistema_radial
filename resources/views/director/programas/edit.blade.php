@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                <div class="section-header">
                    <h1>Editar Programa</h1>
                </div>
            </div>

        </div>



        <div class="row">

            <div class="card">


                <div class="card-body">



                    <form action="{{ route('director.programa.update', $programas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre_programa" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_programa" name="nombre_programa"
                                    value="{{ $programas->nombre_programa }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inicio_mencion" class="form-label">Horario Inicio</label>
                                <input type="time" class="form-control" id="inicio_programa" name="inicio_programa"
                                    value="{{ $programas->inicio_programa }}">
                            </div>
                            <div class="col-md-6">
                                <label for="fin_mencion" class="form-label">Horario Fin</label>
                                <input type="time" class="form-control" id="fin_programa" name="fin_programa"
                                    value="{{ $programas->fin_programa }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <label for="texto_mencion">Descripciòn de Programa (200 palabras máximo)</label>
                                <textarea class="form-control" id="descripcion_programa" rows="5" cols="30" style="height: auto;"
                                    name="descripcion_programa">{{ $programas->descripcion_programa }}</textarea>

                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:2%">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" name="dia_lunes" value="on"
                                    {{ $programas->dia_lunes == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox1"><strong> Lunes</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" name="dia_martes" value="on"
                                    {{ $programas->dia_martes == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox2"><strong> Martes</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" value="on"
                                    name="dia_miercoles"{{ $programas->dia_miercoles == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3"><strong> Miércoles</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" name="dia_jueves" value="on"
                                    {{ $programas->dia_jueves == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3"><strong> Jueves</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" value="on"
                                    name="dia_viernes"{{ $programas->dia_viernes == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3"><strong> Viernes</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" name="dia_sabado" value="on"
                                    {{ $programas->dia_sabado == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3"><strong> Sábado</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="margin-top: 10%" type="checkbox" name="dia_domingo" value="on"
                                    {{ $programas->dia_domingo == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox3"><strong> Domingo</strong></label>
                            </div>

                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-select" name="estado">
                            <option {{ $programas->estado == 1 ? 'selected' : '' }} value="1">Activo</option>
                            <option {{ $programas->estado == 0 ? 'selected' : '' }} value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 2%">
                                        
                                            
                    <div class="row">
                        <div class="col-md-4" style="margin-top: 2%; padding-bottom:2%">
                            <button type="submit" class="btn btn-warning btn-lg btn-block" style="font-size: 1rem"><i class="bi bi-pencil-square"></i>
                            Editar</button>
                        </div>
                        <div class="col-md-4" style="margin-top: 2%; padding-bottom:2%">
                            <a type="submit" href="{{route('director.programa.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
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
