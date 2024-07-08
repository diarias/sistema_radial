@extends('director.layouts.master')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
            <div class="section-header">
                <h1>Editar Entrevista</h1>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{route('director.entrevistas.update', $entrevistas->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Imagen Previa</label>
                                        <br>
                                        <img src="{{asset($entrevistas->imagen)}}" style="width: 200px"  id="imgPreview">
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <input type="file" class="form-control" name="imagen_entrevista" accept="image/png,image/jpg,image/jpeg" onchange="previewImage(event, '#imgPreview')">
                                    </div>
                                    <!--<img src="" alt="" width="100%" id="imgPreview">
                                    <label class="input-group-text" for="inputGroupFile01">Cargar imagen</label>
                                    <input type="file" class="form-control" accept="image/png,image/jpg,image/jpeg" onchange="previewImage(event, '#imgPreview')" name="imagen_entrevista" value="">-->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" style="margin: 0.2rem 0rem 1.3rem 0rem;"><strong>Nombre de
                                                    entrevistado:</strong> </label>
                                            <input type="text" class="form-control" name="nombre_entrevistado" value="{{$entrevistas->nombre_entrevistado}}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for=""><strong>Usuario en Instagram: <a
                                                        href="{{$entrevistas->usuario_instagram}}"
                                                        class="btn" target="_blank"><i class="bi-instagram"
                                                            style="font-size: 1rem; color: rgb(173, 68, 7);"></i></a></strong>
                                            </label>
                                            <input type="text" class="form-control" name="usuario_instagram" value="{{$entrevistas->usuario_instagram}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for=""><strong>Marca o evento en instagram: <a
                                                            href="{{$entrevistas->evento_instagram}}"
                                                            class="btn" target="_blank"><i class="bi-instagram"
                                                                style="font-size: 1rem; color: rgb(173, 68, 7);"></i></a></strong>
                                                </label>
                                                <input type="text" class="form-control" name="evento_instagram" value="{{$entrevistas->evento_instagram}}">
                                                </p>
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="" style="margin: 0.4rem 0rem 0.9rem 0rem;"><strong>Tema
                                                        de evento:</strong> </label>
                                                <input type="text" class="form-control" name="tema" value="{{$entrevistas->tema}}">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for=""><strong>Fecha:</strong> </label>
                                                <input type="date" class="form-control" name="fecha" value="{{$entrevistas->fecha}}">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for=""><strong>Hora:</strong> </label>
                                                <input type="time" class="form-control" name="hora" value="{{$entrevistas->hora}}">

                                            </div>
                                        </div>

 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for=""><strong>Modalidad:</strong> </label>
                                                <select name="modalidad" id="modalidad" class="form-select">
                                                    <option {{$entrevistas->modalidad == 'Presencial' ? 'selected' : ''}} value="Presencial">Presencial</option>
                                                    <option {{$entrevistas->modalidad == 'Virtual' ? 'selected': ''}} value="Virtual">Virtual</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for=""><strong>Seleccione un programa:</strong> </label>
                                              
                                                <select id="inputState" class="form-control main-category" name="programa_id">
                                                    <option value="">Seleccione..</option>
                                                    @foreach ($programas as $programa)
                                                    <option {{$programa->id == $entrevistas->programa_id ? 'selected' : ''}} value="{{$programa->id}}">{{$programa->nombre_programa}}</option>
                                                    @endforeach
                                                </select>

                                                  </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for=""><strong>Boletìn de prensa:</strong> </label>

                                                <textarea name="boletin" id="" cols="30" rows="4" class="form-control" style="height: auto;" >{{$entrevistas->boletin}}</textarea>
                                          
                                            </div>
                                        </div>







                                        <div class="col-md-12" style="margin-top: 2%">
                                        
                                            
                                            <div class="row">
                                                <div class="col-md-4" style="margin-top: 4%">
                                                    <button type="submit" class="btn btn-warning btn-lg btn-block" style="font-size: 1rem"><i class="bi bi-pencil-square"></i>
                                                    Editar</button>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 4%">
                                                    <a type="submit" href="{{route('director.entrevistas.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
                                                        Regresar</a>
                                                </div>
                                            </div>






                                              
                                        </div>

                                    </div>





                                </div>
                            </div>
                        </div>


                    </div>

                </form>






            </div>

        </div>

    </div>

</section>
@endsection