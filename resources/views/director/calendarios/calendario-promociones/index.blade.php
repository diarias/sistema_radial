@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Calendario de Promociones: Busqueda por Fechas</h1>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table  ">
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
                                <th style="text-align: center; background-color: black; color: white">Promoción</th>
                                <th style="text-align: center; background-color: black; color: white">Programa</th>
                                
                                <th style="text-align: center; background-color: black; color: white">Fecha Inicio</th>
                                <th style="text-align: center; background-color: black; color: white">Fecha Fin</th>
                                <th style="text-align: center; background-color: black; color: white">Estado</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($resultado as $evento)
                                @php
                                    // Buscar la promoción correspondiente al evento en el calendario
                                    $promocion = $promocionesTabla->where('id', $evento->promocion_id)->first();
                                    // Establecer la clase de estado
                                    $estadoClass = $promocion->estado == '1' ? 'pendiente' : 'realizado';
                                @endphp
                                <tr>
                                    <td hidden>{{ $evento->id }}</td>
                                    <td>{{ $evento->promocion_id }}</td>
                                    <td>{{ $evento->programa_id }}</td>
                                    <td>{{ $evento->fecha_inicio }}</td>
                                    <td>{{ $evento->fecha_fin }}</td>

                                    <td class="{{ $estadoClass }}">
                                        @if ($estadoClass == 'pendiente')
                                            Pendiente
                                        @elseif ($estadoClass == 'realizado')
                                            Realizado
                                        @else
                                            No aplica
                                        @endif
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
