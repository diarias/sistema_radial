@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                <div class="section-header">
                    <h1>Crear Programa</h1>
                </div>
            </div>

        </div>



        <div class="row">

            <div class="card">


                <div class="card-body">



                    <form action="{{ route('director.programa.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre_programa" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_programa" name="nombre_programa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inicio_mencion" class="form-label">Horario Inicio</label>
                                <input type="time" class="form-control" id="inicio_programa" name="inicio_programa">
                            </div>
                            <div class="col-md-6">
                                <label for="fin_mencion" class="form-label">Horario Fin</label>
                                <input type="time" class="form-control" id="fin_programa" name="fin_programa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-top:2%">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_lunes" value="on">
                                    <label class="form-check-label" for="inlineCheckbox1"><strong>Lunes</strong></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_martes" value="on">
                                    <label class="form-check-label" for="inlineCheckbox2"><strong>Martes</strong></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_miercoles" value="on">
                                    <label class="form-check-label" for="inlineCheckbox3"><strong>Miércoles</strong></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_jueves" value="on">
                                    <label class="form-check-label" for="inlineCheckbox3"><strong>Jueves</strong></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_viernes" value="on">
                                    <label class="form-check-label" for="inlineCheckbox3"><strong>Viernes</strong></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_sabado" value="on">
                                    <label class="form-check-label" for="inlineCheckbox3"><strong>Sábado</strong></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="dia_domingo" value="on">
                                    <label class="form-check-label" for="inlineCheckbox3"><strong>Domingo</strong></label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:2%">

                                <label for="texto_mencion">Descripciòn de Programa (200 palabras máximo)</label>
                                <textarea class="form-control" id="descripcion" rows="5" cols="30" style="height: auto;"
                                    name="descripcion_programa"></textarea>
                                    <p id="wordCountDisplay">Palabras: 0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="inputState">Estado</label>
                                <select id="inputState" class="form-control" name="estado">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4" style="margin-top: 2%">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"
                                    style="font-size: 1rem"><i class="bi bi-floppy2-fill" style="font-size: 1rem"></i>
                                    Guardar</button>
                            </div>
                            <div class="col-md-4" style="margin-top: 2%">
                                <a type="submit" href="{{ route('director.programa.index') }}"
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
<script>
    // cuentas las palabras que estan escritas y bloque cuando llegan a 200
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.getElementById('descripcion');
        var wordCountDisplay = document.getElementById('wordCountDisplay');

        textarea.addEventListener('input', function() {
            var words = textarea.value.split(/\s+/).filter(function(word) {
                return word.length > 0;
            });

            var wordCount = words.length;

            // Limita a 20 palabras
            if (wordCount > 200) {
                var trimmedText = words.slice(0, 200).join(' ');
                textarea.value = trimmedText;
                wordCount = 200;
            }

            // Muestra el recuento de palabras en el párrafo
            wordCountDisplay.textContent = 'Palabras: ' + wordCount;
        });
    });
</script>
