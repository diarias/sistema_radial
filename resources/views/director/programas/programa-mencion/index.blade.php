@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Asignar programas a mensión: {{ $menciones->titulo }}</h1>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5>Lista de programas disponibles</h5>
                    <div class="row" style="margin: 2% 0% 2% 0%;">
                        <div class="d-grid gap-2 col-12">
                            <form action="{{ route('director.programa-mencion.store') }}" method="POST" id="formElement"
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






                                        <div class="container">
                                            <div class="table table-responsive">
                                                <table id="tablax" class="table table-bordered table-striped">
                                                    <thead style="background-color: #3abaf4; color: white">
                                                        <th scope="col" style="color: white">id</th>
                                                        <th scope="col" style="color: white">Nombre Programa</th>
                                                        <th style="text-align:center; color: white">Marcar</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($programas as $programa)
                                                            <tr>
                                                                <td> {{ $programa->id }}</td>
                                                                <td style="text-align:center;">
                                                                    {{ $programa->nombre_programa }}
                                                                </td>
                                                                <td class="small-padding"
                                                                    style="text-align:center; padding-bottom: 2%;">
                                                                    <input class="form-check-input " type="checkbox"
                                                                        value="{{ $programa->id }}" id="flexCheckDefault"
                                                                        name="programa[]">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- script de tabla locutores llama a las funciones buscar filtrar y le hace en español -->
                                        <script>
                                            $(document).ready(function() {
                                                $('#tablax').DataTable({
                                                    language: {
                                                        processing: "Tratamiento en curso...",
                                                        search: "Buscar&nbsp;:",
                                                        lengthMenu: "Agrupar de _MENU_ items",
                                                        info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                                                        infoEmpty: "No existen datos.",
                                                        infoFiltered: "(filtrado de _MAX_ elementos en total)",
                                                        infoPostFix: "",
                                                        loadingRecords: "Cargando...",
                                                        zeroRecords: "No se encontraron datos con tu busqueda",
                                                        emptyTable: "No hay datos disponibles en la tabla.",
                                                        paginate: {
                                                            first: "Primero",
                                                            previous: "Anterior",
                                                            next: "Siguiente",
                                                            last: "Ultimo"
                                                        },
                                                        aria: {
                                                            sortAscending: ": active para ordenar la columna en orden ascendente",
                                                            sortDescending: ": active para ordenar la columna en orden descendente"
                                                        }
                                                    },
                                                    scrollY: 300,
                                                    lengthMenu: [
                                                        [5, 10, 25, -1],
                                                        [5, 10, 25, "All"]
                                                    ],
                                                });
                                            });
                                        </script>
                                    </div>
                                    <input type="hidden" value="{{ $menciones->id }}" name="mencion_programa"></input>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="margin-top: 2%">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"
                                            style="font-size: 1rem"><i class="bi bi-floppy2-fill"
                                                style="font-size: 1rem"></i>
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
<!--Script de tabla muchos a muchos -->
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
