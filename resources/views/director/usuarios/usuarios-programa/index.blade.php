@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Programas disponibles</h1>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5>Asignar un Programa a: {{ $usuario->nombre }} {{ $usuario->apellido }}</h5>
                    <div class="row" style="margin: 2% 0% 2% 0%;">
                        <div class="d-grid gap-2 col-12">
                            <form action="{{ route('director.usuario-programa.store') }}" method="POST" id="formElement"
                                name="f1">
                                @csrf
                                <div class="form-group">
                                    <label>Programas Disponibles</label>
                                    <div class="d-grid gap-2 col-md-12">

                                        <p>
                                            <button class="btn btn-info" id="marcarTodo"
                                                style="font-size: 1rem; color:white">Marcar todo</button> |
                                            <button class="btn btn-info" id="desmarcarTodo"
                                                style="font-size: 1rem; color:white">Desmarcar todo</button>
                                        </p>






                                        @foreach ($programas as $programa)
                                            <div class="form-check-inline">

                                                <input class="form-check-input" type="checkbox" value="{{ $programa->id }}"
                                                    id="flexCheckDefault" name="programa[]">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $programa->nombre_programa }}
                                                </label>

                                            </div>
                                        @endforeach



                                    </div>
                                    <input type="hidden" value="{{ $usuario->id }}" name="usuario_programa"></input>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"
                                            style="font-size: 1rem"><i class="bi bi-floppy2-fill"
                                                style="font-size: 1rem"></i>
                                            Guardar</button>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 2%">
                                        <a type="submit" href="{{ route('director.usuario.index') }}"
                                            class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i
                                                class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
                                            Regresar</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin: 0% 0% 2% 0%;">
                    </div>





                    <div class="table table-responsive">
                        {{ $dataTable->table() }}
                    </div>




                </div>

            </div>

        </div>

    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<!-- Script para marcar y descarmcar todos los programas-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('marcarTodo').addEventListener('click', function(e) {
            e.preventDefault();
            //seleccionarTodo();
            checkAll();
        });
        document.getElementById('desmarcarTodo').addEventListener('click', function(e) {
            e.preventDefault();
            //desmarcarTodo();
            uncheckAll();
        });
    });

    function seleccionarTodo() {
        for (let i = 0; i < document.f1.elements.length; i++) {
            if (document.f1.elements[i].type === "checkbox") {
                document.f1.elements[i].checked = true;
            }
        }
    }

    function desmarcarTodo() {
        for (let i = 0; i < document.f1.elements.length; i++) {
            if (document.f1.elements[i].type == "checkbox") {
                document.f1.elements[i].checked = false
            }
        }
    }

    function checkAll() {
        document.querySelectorAll('#formElement input[type=checkbox]').forEach(function(checkElement) {
            checkElement.checked = true;
        });
    }

    function uncheckAll() {
        document.querySelectorAll('#formElement input[type=checkbox]').forEach(function(checkElement) {
            checkElement.checked = false;
        });
    }
</script>
