@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Lista de Programas</h1>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin: 0% 0% 2% 0%;">

                        <div class="d-grid gap-2 col-lg-2 col-md-6 col-6 col-sm-6">
                            <a href="{{ route('director.programa.create') }}" class="btn btn-primary "><i
                                    class="bi bi-plus-circle" style="font-size: 1.0rem; color: rgb(255, 255, 255);"></i>
                                Crear</a>
                        </div>
                        <div class="d-grid col-lg-2 col-md-6 col-6 col-sm-6">
                            <a href="{{ route('director.panel') }}" class="btn btn-info " style="color: white"><i class="bi bi-house-door-fill"
                                    style="font-size: 1.0rem; color: rgb(255, 255, 255);"></i> Inicio</a>
                        </div>



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
