@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Panel de informaciòn</h1>
        </div>


        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card  shadow  py-2 bg-primary text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase" style="font-size: 25px">
                                    Usuarios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px">{{ $personal }}</div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                  </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card  shadow  py-2 bg-danger text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase" style="font-size: 25px">
                                    Entrevistas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"> {{ $entrevistasDia }}</div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z"/>
                                    <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z"/>
                                  </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" >

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card  shadow  py-2 bg-warning text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase" style="font-size: 25px">
                                    Promociones</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px">{{ $promocionesDia }}</div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                  </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            




            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card  shadow  py-2 bg-success text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase" style="font-size: 25px">
                                    Programas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px">  {{ $programas }}</div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                  </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



      

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="section-header">
                        <h1>Actividades de hoy</h1>
                    </div>

                    <div class="card-body">
                        <div class="card-header">
                            <h4>Entrevistas</h4>
                        </div>
                        <div class="card_body">


                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="table-responsive table">
                                        <table id="example" class="display nowrap ">
                                            <thead>
                                                <tr>

                                                    <th hidden
                                                        style="text-align: center; background-color: black; color: white">Id
                                                    </th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Imagen

                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Nombre Entrevistado
                                                    </th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Tema</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Programa</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Fecha Entrevista</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Hora Entrevista</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Modalidad</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Estado</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($entrevistasTabla as $entrevista)
                                                    @php
                                                        $estadoClass = $entrevista->estado == '1' ? 'pendiente' : 'realizado';
                                                    @endphp
                                                    <tr>
                                                        <td hidden>{{ $entrevista->id }}</td>
                                                        <td>
                                                            <center><img src="{{ asset($entrevista->imagen) }}"
                                                                    alt="imagen entrevista" width="100%"></center>
                                                        </td>
                                                        <td>{{ $entrevista->nombre_entrevistado }}</td>
                                                        <td>{{ $entrevista->tema }}</td>
                                                        <td>{{ $entrevista->programa->nombre_programa }}</td>
                                                        <td>{{ $entrevista->fecha }}</td>
                                                        <td>{{ $entrevista->hora }}</td>
                                                        <td>{{ $entrevista->modalidad }}</td>
                                                        <td class="{{ $estadoClass }}">
                                                            {{ $entrevista->estado == '1' ? 'Pendiente' : 'Realizado' }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>









                        </div>
                        <div class="card-header">
                            <h4>Promociones </h4>
                        </div>
                        <div>


                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="table-responsive table">
                                        <table id="example" class="display nowrap ">
                                            <thead>
                                                <tr>

                                                    <th hidden
                                                        style="text-align: center; background-color: black; color: white">Id
                                                    </th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Imagen</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Titulo

                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Fecha Inicio
                                                    </th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Fecha Fin</th>
                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Descripción</th>


                                                    <th style="text-align: center; background-color: black; color: white">
                                                        Estado</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($promocionesTabla as $promociones)
                                                    @php
                                                        $estadoClass = $promociones->estado == '1' ? 'pendiente' : 'realizado';
                                                    @endphp
                                                    <tr>
                                                        <td hidden>{{ $promociones->id }}</td>
                                                        <td>
                                                            <center><img src="{{ asset($promociones->imagen) }}"
                                                                    alt="imagen entrevista" width="50%"></center>
                                                        </td>
                                                        <td>{{ $promociones->titulo }}</td>

                                                        <td>{{ $promociones->fecha_inicio }}</td>
                                                        <td>{{ $promociones->fecha_fin }}</td>
                                                        <td>{{ $promociones->descripcion }}</td>

                                                        <td class="{{ $estadoClass }}">
                                                            {{ $promociones->estado == '1' ? 'Pendiente' : 'Realizado' }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>




    </section>
@endsection



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
