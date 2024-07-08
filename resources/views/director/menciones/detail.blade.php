@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Información de Menciòn</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for=""><strong>Cliente:</strong> </label>
                                    <p>{{ $menciones->cliente }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Titulo:</label>
                                    <p>{{ $menciones->titulo }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Periodo</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for=""><strong>Fecha inicio:</strong> </label>
                                    <p>{{ $menciones->fecha_ini }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Fecha fin:</label>
                                    <p>{{ $menciones->fecha_fin }}</p>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <label for=""><strong>Periodicidad:</strong> </label>
                                    <p>{{ $menciones->frecuencia }}</p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="" class="form-label">Texto</label>
                                    <p style="height: 100%; font-size: 2rem;">{{ $menciones->cliente }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 " style="margin-top: 5%;">
                                    <a href="{{ route('director.menciones.index') }}" class="btn btn-info btn-lg btn-block"
                                        style="font-size: 120%;"><i class="bi bi-arrow-return-left"></i> Retroceder</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
