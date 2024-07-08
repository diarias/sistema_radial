@extends('director.layouts.master')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
            <div class="section-header">
                <h1>Crear Entrevista</h1>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{route('director.entrevistas.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" alt="" width="100%" id="imgPreview">
                                    <label class="input-group-text" for="inputGroupFile01">Cargar imagen</label>
                                    <input type="file" class="form-control" accept="image/png,image/jpg,image/jpeg" onchange="previewImage(event, '#imgPreview')" name="imagen_entrevista">
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
                                            <input type="text" class="form-control" name="nombre_entrevistado">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for=""><strong>Usuario en Instagram: <a
                                                        href="https://instagram.com/los40ecuador?igshid=OGQ5ZDc2ODk2ZA=="
                                                        class="btn" target="_blank"><i class="bi-instagram"
                                                            style="font-size: 1rem; color: rgb(173, 68, 7);"></i></a></strong>
                                            </label>
                                            <input type="text" class="form-control" name="usuario_instagram">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for=""><strong>Marca o evento en instagram: <a
                                                            href="https://instagram.com/los40ecuador?igshid=OGQ5ZDc2ODk2ZA=="
                                                            class="btn" target="_blank"><i class="bi-instagram"
                                                                style="font-size: 1rem; color: rgb(173, 68, 7);"></i></a></strong>
                                                </label>
                                                <input type="text" class="form-control" name="evento_instagram">
                                                </p>
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="" style="margin: 0.4rem 0rem 0.9rem 0rem;"><strong>Tema
                                                        de evento:</strong> </label>
                                                <input type="text" class="form-control" name="tema">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for=""><strong>Fecha:</strong> </label>
                                                <input type="date" class="form-control" name="fecha">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for=""><strong>Hora:</strong> </label>
                                                <input type="time" class="form-control" name="hora">

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for=""><strong>Modalidad:</strong> </label>
                                                <select name="modalidad" id=modalidad" class="form-select">
                                                    <option value="Presencial">Presencial</option>
                                                    <option value="Virtual">Virtual</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for=""><strong>Selecciones Programa:</strong> </label>
                                                <select id="inputState" class="form-select" name="programa_id">
                                                    <option value="">Seleccione..</option>
                                                    @foreach ($programas as $programa)
                                                    <option value="{{$programa->id}}">{{$programa->nombre_programa}}</option>
                                                    @endforeach
                                                </select>
                                                   </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12" style="margin-top: 2%">
                                               
                                                <label for=""><strong>Boletìn de prensa:</strong> </label>

                                                <textarea name="boletin" id="" cols="30" rows="4" class="form-control" style="height: auto;"></textarea>
                                        

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4" style="margin-top: 4%">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="font-size: 1rem"><i
                                                        class="bi bi-floppy2-fill" style="font-size: 1rem"></i>
                                                    Guardar</button>
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

                </form>






            </div>

        </div>

    </div>

</section>
@endsection

<script>
    function previewImage(event, querySelector) {

        //Recuperamos el input que desencadeno la acción
        const input = event.target;

        //Recuperamos la etiqueta img donde cargaremos la imagen
        $imgPreview = document.querySelector(querySelector);

        // Verificamos si existe una imagen seleccionada
        if (!input.files.length) return

        //Recuperamos el archivo subido
        file = input.files[0];

        //Creamos la url
        objectURL = URL.createObjectURL(file);

        //Modificamos el atributo src de la etiqueta img
        $imgPreview.src = objectURL;

    }
</script>

