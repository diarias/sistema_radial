@extends('director.layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                <div class="section-header">
                    <h1>Crear Promocion</h1>
                </div>
            </div>

        </div>



        <div class="row">

            <div class="card">


                <div class="card-body">



                    <form class="row g-3" action="{{route('director.promociones.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label for="cliente" class="form-label">Titulo de promociones:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo">
                        </div>
                        <div class="col-md-6">
                            <label for="inicio_mencion" class="form-label">Fecha inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                        </div>
                        <div class="col-md-6">
                            <label for="fin_mencion" class="form-label">Fecha Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                        </div>
                        <div class="col-md-12">
                            <label for="cliente" class="form-label">Descripciòn de promociòn:</label>
                            <textarea name="descripcion" id="" cols="30" rows="3" class="form-control" style="height: auto;"></textarea>
                        </div>
                        <div class="col-md-6">


                            <center> <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                                    alt="Imagen de promociòn" width="50%" id="imgPreview"></center>
                            <label for="" class="form-label" style="margin-top: 2%;">Cargar imagen de
                                promociòn </label>
                            <input type="file" class="form-control" accept="image/png,image/jpg,image/jpeg"
                                onchange="previewImage(event, '#imgPreview')" name="imagen">

                        </div>
                        <div class="col-md-6">
                            <div class="video-container">.
                                <video width="90%" id="videoPlayer" src="{{ asset('backend/assets/img/avatar/carga_video.mp4') }}" id="video_player" autoplay controls>
                                </video>
                                <label for="" class="form-label" style="margin-top: 2%;">Cargar video de promoción </label>
                                   <input type="file" id="videoInput" class="form-control" accept="video/*" onchange="previewVideo()" width="90%" name="video">
                            
                                </div>
                        
                            <script>
                                function previewVideo() {
                                    var videoInput = document.getElementById('videoInput');
                                    var videoPlayer = document.getElementById('videoPlayer');
                        
                                    var file = videoInput.files[0];
                                    var objectURL = URL.createObjectURL(file);
                        
                                    videoPlayer.src = objectURL;
                                    videoPlayer.style.display = 'block';
                                }
                            </script> 
                        
                          
                        </div>




                        <hr>

                        <div class="col-md-12">
                            <div class="body-redes">
                                <section class="botones-redes">
                                    <a href="https://www.facebook.com/Los40Ecuador" target="_blank"
                                        class="fa fa-facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="https://twitter.com/Los40?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                                        target="_blank" class="fa fa-twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="https://www.instagram.com/los40ecuador/?hl=es" target="_blank"
                                        class="fa fa-instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="https://www.tiktok.com/@los40ecuador" target="_blank" class="fa fa-facebook"><i class="bi bi-tiktok"></i></a>
                                </section>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-4 col-lg-4" style="margin-top: 6%">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="font-size: 1rem"><i
                                        class="bi bi-floppy2-fill" style="font-size: 1rem"></i>
                                    Guardar</button>
                            </div>
                            <div class="col-md-4 col-lg-4" style="margin-top: 6%">
                                <a type="submit" href="{{route('director.promociones.index')}}" class="btn btn-info btn-lg btn-block" style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left" style="font-size: 1rem; color:white"></i>
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
    /*
    var fileInput = document.getElementById("file_video")
    var video = document.getElementById("video_player")

    fileInput.addEventListener("change", function (e) {
        video.src = URL.createObjectURL(this.files[0]);
    })
    */

    var fileInput = document.getElementById("file_video")
    var video = document.getElementById("video_player")

    fileInput.addEventListener("change", function(e) {
        video.src = URL.createObjectURL(this.files[0]);
    })
</script>
<!-- Scrip de imagen vista previa js-->
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
