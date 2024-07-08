@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Calendario de Entrevistas: Busqueda por Fechas</h1>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center; background-color: black; color: white">Fecha
                                    Inicial:</th>
                                <th scope="col" style="text-align: center; background-color: black; color: white">Fecha
                                    Fin:</th>
                                <th scope="col" style="text-align: center; background-color: black; color: white">Acción
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center">
                                    <input id="min" name="min" value="{{ \Carbon\Carbon::now()->toDateString() }}"
                                        readonly>
                                    <i class="bi bi-calendar-week"></i>
                                </td>
                                <td style="text-align: center">
                                    <input id="max" name="max" value="{{ \Carbon\Carbon::now()->toDateString() }}"
                                        readonly>
                                    <i class="bi bi-calendar-week"></i>
                                </td>
                                <td style="text-align: center">
                                    <button id="todayButton" class="btn btn-primary">Entrevistas del día</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                    <table id="example" class="display nowrap ">
                        <thead>
                            <tr>
                                <th hidden style="text-align: center; background-color: black; color: white">Id</th>
                                <th style="text-align: center; background-color: black; color: white">Nombre Entrevistado</th>
                                <th style="text-align: center; background-color: black; color: white">Nombre de programa</th>
                                <th style="text-align: center; background-color: black; color: white">Fecha</th>
                                <th style="text-align: center; background-color: black; color: white">Estado</th>
                                <th style="text-align: center; background-color: black; color: white">Accion</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrevistasTabla as $entrevista)
                                @php
                                    $estadoClass = $entrevista->estado == '1' ? 'pendiente' : 'realizado';
                                @endphp
                                <tr>
                                    <td hidden>{{ $entrevista->id }}</td>

                                    <td>{{ $entrevista->entrevista->nombre_entrevistado }}</td>
                                    <td>{{ $entrevista->programa->nombre_programa }}</td>
                                    <td>{{$entrevista->fecha }}</td>
                                    
                                    <!-- Otros campos de la entrevista -->



                                    <td class="{{ $estadoClass }}">
                                        {{ $entrevista->estado == '1' ? 'Pendiente' : 'Realizado' }} </td>
                                    <td style="text-align: center"><a class="btn btn-warning"
                                        href="{{ route('director.calendario.entrevistas.activar-inactivar', $entrevista->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
                                            <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/>
                                          </svg></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let minDate, maxDate;
            let table = new DataTable('#example');

            // Custom filtering function
            DataTable.ext.search.push(function(settings, data, dataIndex) {
                let min = minDate.val();
                let max = maxDate.val();
                let date = new Date(data[3]);

                if (
                    (min === '' && max === '') ||
                    (min === '' && date <= max) ||
                    (min <= date && max === '') ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            });

            // Create date inputs
            minDate = new DateTime('#min', {
                format: 'YYYY-MM-DD'
            });
            maxDate = new DateTime('#max', {
                format: 'YYYY-MM-DD'
            });

            // Establecer las fechas actuales
            let today = new Date().toISOString().split('T')[0];
            minDate.val(today);
            maxDate.val(today);

            // Dibujar la tabla al cargar la página
            table.draw();

            // Event listener para el botón "Hoy"
            $('#todayButton').on('click', function() {
                // Establecer las fechas actuales
                let today = new Date().toISOString().split('T')[0];
                minDate.val(today);
                maxDate.val(today);

                // Refiltrar y redibujar la tabla
                table.draw();
            });

            // Event listener para cambios en las fechas
            $('#min, #max').on('change', function() {
                // Refiltrar y redibujar la tabla
                table.draw();
            });
        });
    </script>
@endpush


<style>
    /* Estilos para entrevistas pendientes */
    td.pendiente {
        background-color: #11b154;
        color: white;
        text-align: center;
        /* Color amarillo, puedes cambiarlo según tus preferencias */
    }

    /* Estilos para entrevistas realizadas */
    td.realizado {
        background-color: #800000;
        /* Color verde, puedes cambiarlo según tus preferencias */
        color: white;
        text-align: center;
        /* Texto blanco para mayor contraste */
    }
</style>
