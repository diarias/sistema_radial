@extends('director.layouts.master')
@section('content')
    <section class="section">
        <form action="{{ route('director.usuario.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section-header">
                <h1>Crear Usuario</h1>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4 ">
                    <div class="col-12 col-md-12 col-lg-12 ">
                        <div class="card profile-widget">
                            <div class="profile-widget-description">
                                <div class="row" style="margin-top: 2%;">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <center> <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }} "
                                                    alt="" width="29%"
                                                    style="border-radius: 20%; justify-content: center;" id="imgPreview">
                                            </center>
                                            <br>
                                            <label>Usuario:</label>
                                            <input type="file" class="form-control"
                                                accept="image/png,image/jpg,image/jpeg" name="imagen_perfil"
                                                onchange="previewImage(event, '#imgPreview')">
                                        </div>
                                        <div class="form-group col-md-6 col-12" style="margin-top: 3%;">
                                            <label>Contraseña:</label>
                                            <input type="text" class="form-control" value="Los40,123456" name="password"
                                                readonly>
                                            <label>Rol:</label>
                                            <select class="form-select" aria-label="Default select example" name="id_rol">
                                                <option value="" selected>Seleccione una opción </option>
                                                <option value="director">Dirección</option>
                                                <option value="coordinador">Coordinador</option>
                                                <option value="productor">Productor</option>
                                                <option value="locutor">Locutor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="profile-widget-name">
                                        <hr>
                                        Ingresar información de usuario
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nombres:</label>
                                        <input type="text" class="form-control" required="" name="nombre">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Apellidos:</label>
                                        <input type="text" class="form-control" required="" name="apellido">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Telefono:</label>
                                        <input type="number" class="form-control" required="" name="telefono">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Fecha de nacimiento:</label>
                                        <input type="date" class="form-control" required="" name="fecha_nacimiento">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Sexo:</label>
                                        <select class="form-select" aria-label="Default select example" name="sexo">
                                            <option value="" selected>Seleccione una opción </option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>

                                        </select>

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nombre Artistico:</label>
                                        <input class="form-control" type="text" id="alias" name="nombre_artistico">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Correo:</label>
                                        <input type="email" class="form-control" required="" name="correo">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nacionalidad:</label>
                                        <select class="form-select" aria-label="Default select example" name="nacionalidad">
                                            <option value="" selected>Seleccione una opción </option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Afganistán">Afganistán</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Alemania">Alemania</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antártida">Antártida</option>
                                            <option value="Antigua">Antigua</option>
                                            <option value="Antillas">Antillas</option>
                                            <option value="Arabia">Arabia</option>
                                            <option value="Argelia">Argelia</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaiján">Azerbaiján</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Bélgica">Bélgica</option>
                                            <option value="Belice">Belice</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bielorusia">Bielorusia</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia">Bosnia</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brasil">Brasil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina">Burkina</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cabo">Cabo</option>
                                            <option value="Camboya">Camboya</option>
                                            <option value="Camerún">Camerún</option>
                                            <option value="Canadá">Canadá</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Chipre">Chipre</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Corea">Corea</option>
                                            <option value="Costa">Costa Rica</option>
                                            <option value="Croacia">Croacia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Darussalam">Darussalam</option>
                                            <option value="Dinamarca">Dinamarca</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egipto">Egipto</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Eslovaquia">Eslovaquia</option>
                                            <option value="Eslovenia">Eslovenia</option>
                                            <option value="España">España</option>
                                            <option value="Estados">Estados</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Etiopía">Etiopía</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Filipinas">Filipinas</option>
                                            <option value="Finlandia">Finlandia</option>
                                            <option value="Francia">Francia</option>
                                            <option value="Gabón">Gabón</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Grecia">Grecia</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Groenlandia">Groenlandia</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guayana">Guayana</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haití">Haití</option>
                                            <option value="Holanda">Holanda</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong">Hong</option>
                                            <option value="Hungría">Hungría</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Irak">Irak</option>
                                            <option value="Irán">Irán</option>
                                            <option value="Irlanda">Irlanda</option>
                                            <option value="Islandia">Islandia</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italia">Italia</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japón">Japón</option>
                                            <option value="Jordania">Jordania</option>
                                            <option value="Kazajstán">Kazajstán</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kirguistán">Kirguistán</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Letonia">Letonia</option>
                                            <option value="Líbano">Líbano</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libia">Libia</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lituania">Lituania</option>
                                            <option value="Luxemburgo">Luxemburgo</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malasia">Malasia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marruecos">Marruecos</option>
                                            <option value="Martinica">Martinica</option>
                                            <option value="Mauricio">Mauricio</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="México">México</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Mónaco">Mónaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Níger">Níger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Noruega">Noruega</option>
                                            <option value="Omán">Omán</option>
                                            <option value="Pakistán">Pakistán</option>
                                            <option value="Panamá">Panamá</option>
                                            <option value="Papua">Papua</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Perú">Perú</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Polinesia">Polinesia</option>
                                            <option value="Polonia">Polonia</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto">Puerto</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="RD">RD</option>
                                            <option value="Reino">Reino</option>
                                            <option value="República">República</option>
                                            <option value="República">República</option>
                                            <option value="República">República</option>
                                            <option value="Reunión">Reunión</option>
                                            <option value="Rumania">Rumania</option>
                                            <option value="Rusia">Rusia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Sahara">Sahara</option>
                                            <option value="Saint">Saint</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra">Sierra</option>
                                            <option value="Singapur">Singapur</option>
                                            <option value="Siria">Siria</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="Sri">Sri</option>
                                            <option value="Sudáfrica">Sudáfrica</option>
                                            <option value="Sudán">Sudán</option>
                                            <option value="Suecia">Suecia</option>
                                            <option value="Suiza">Suiza</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swazilandia">Swazilandia</option>
                                            <option value="Taiwán">Taiwán</option>
                                            <option value="Uruguay">Uruguay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Pais:</label>
                                        <select class="form-select" aria-label="Default select example" name="pais">
                                            <option value="" selected>Seleccione una opción </option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Afganistán">Afganistán</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Alemania">Alemania</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antártida">Antártida</option>
                                            <option value="Antigua">Antigua</option>
                                            <option value="Antillas">Antillas</option>
                                            <option value="Arabia">Arabia</option>
                                            <option value="Argelia">Argelia</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaiján">Azerbaiján</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Bélgica">Bélgica</option>
                                            <option value="Belice">Belice</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bielorusia">Bielorusia</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia">Bosnia</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brasil">Brasil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina">Burkina</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cabo">Cabo</option>
                                            <option value="Camboya">Camboya</option>
                                            <option value="Camerún">Camerún</option>
                                            <option value="Canadá">Canadá</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Chipre">Chipre</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Corea">Corea</option>
                                            <option value="Costa">Costa Rica</option>
                                            <option value="Croacia">Croacia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Darussalam">Darussalam</option>
                                            <option value="Dinamarca">Dinamarca</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egipto">Egipto</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Eslovaquia">Eslovaquia</option>
                                            <option value="Eslovenia">Eslovenia</option>
                                            <option value="España">España</option>
                                            <option value="Estados">Estados</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Etiopía">Etiopía</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Filipinas">Filipinas</option>
                                            <option value="Finlandia">Finlandia</option>
                                            <option value="Francia">Francia</option>
                                            <option value="Gabón">Gabón</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Grecia">Grecia</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Groenlandia">Groenlandia</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guayana">Guayana</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haití">Haití</option>
                                            <option value="Holanda">Holanda</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong">Hong</option>
                                            <option value="Hungría">Hungría</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Irak">Irak</option>
                                            <option value="Irán">Irán</option>
                                            <option value="Irlanda">Irlanda</option>
                                            <option value="Islandia">Islandia</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italia">Italia</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japón">Japón</option>
                                            <option value="Jordania">Jordania</option>
                                            <option value="Kazajstán">Kazajstán</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kirguistán">Kirguistán</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Letonia">Letonia</option>
                                            <option value="Líbano">Líbano</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libia">Libia</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lituania">Lituania</option>
                                            <option value="Luxemburgo">Luxemburgo</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malasia">Malasia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marruecos">Marruecos</option>
                                            <option value="Martinica">Martinica</option>
                                            <option value="Mauricio">Mauricio</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="México">México</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Mónaco">Mónaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Níger">Níger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Noruega">Noruega</option>
                                            <option value="Omán">Omán</option>
                                            <option value="Pakistán">Pakistán</option>
                                            <option value="Panamá">Panamá</option>
                                            <option value="Papua">Papua</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Perú">Perú</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Polinesia">Polinesia</option>
                                            <option value="Polonia">Polonia</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto">Puerto</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="RD">RD</option>
                                            <option value="Reino">Reino</option>
                                            <option value="República">República</option>
                                            <option value="República">República</option>
                                            <option value="República">República</option>
                                            <option value="Reunión">Reunión</option>
                                            <option value="Rumania">Rumania</option>
                                            <option value="Rusia">Rusia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Sahara">Sahara</option>
                                            <option value="Saint">Saint</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra">Sierra</option>
                                            <option value="Singapur">Singapur</option>
                                            <option value="Siria">Siria</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="Sri">Sri</option>
                                            <option value="Sudáfrica">Sudáfrica</option>
                                            <option value="Sudán">Sudán</option>
                                            <option value="Suecia">Suecia</option>
                                            <option value="Suiza">Suiza</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swazilandia">Swazilandia</option>
                                            <option value="Taiwán">Taiwán</option>
                                            <option value="Uruguay">Uruguay</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Ciudad:</label>
                                        <input class="form-control" type="text" name="ciudad">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Dirección:</label>
                                        <textarea name="direccion" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>






                                    <div class="profile-widget-name">
                                        <hr>
                                        Redes Sociales
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label> <i class="bi-facebook"
                                                    style="font-size: 1rem; color: cornflowerblue;"></i>
                                                Facebook:</label>
                                            <input type="text" class="form-control" value="www.facebook.com"
                                                required="" name="facebook">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-twitter"
                                                    style="font-size: 1rem; color: cornflowerblue;"></i>
                                                Twitter:</label>
                                            <input type="text" class="form-control" value="www.twitter.com"
                                                required="" name="twitter">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-instagram"
                                                    style="font-size: 1rem; color: rgb(173, 68, 7);"></i>
                                                Instagram:</label>
                                            <input type="text" class="form-control" value="www.instagram.com"
                                                required="" name="instagram">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label><i class="bi-youtube"
                                                    style="font-size: 1rem; color: rgb(250, 4, 4);"></i>
                                                Youtube:</label>
                                            <input type="text" class="form-control" value="www.youtube.com"
                                                required="" name="youtube">
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">
                                        <hr>
                                        Biografia de locutor:
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label> Biografía (Maximo de 200 palabras):</label>
                                            <textarea class="form-control" name="biografia" id="biografiaTextarea" cols="60" rows="60"
                                                style="height: 100px"></textarea>
                                            <p id="wordCountDisplay">Palabras: 0</p>
                                        </div>
                                    </div>
                                    <div class="profile-widget-name">
                                        <hr>
                                        Camiseta:
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6 col-12" style="text-align: center;">
                                            <img src="{{ asset('backend/assets/img/camiseta-los40-retro.jpg') }} "
                                                alt="" width="40%">

                                        </div>


                                        <div class="form-group col-md-6 col-12">
                                            <label> Talla:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="talla">
                                                <option value="0" selected>Seleccione una opción</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>

                                    </div>






                                    <div class="row">
                                        <div class="col-md-4 col-lg-4" style="margin-top: 6%">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                style="font-size: 1rem"><i class="bi bi-floppy2-fill"
                                                    style="font-size: 1rem"></i>
                                                Guardar</button>
                                        </div>
                                        <div class="col-md-4 col-lg-4" style="margin-top: 6%">
                                            <a type="submit" href="{{ route('director.usuario.index') }}"
                                                class="btn btn-info btn-lg btn-block"
                                                style="font-size: 1rem; color:white"><i class="bi bi-arrow-return-left"
                                                    style="font-size: 1rem; color:white"></i>
                                                Regresar</a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>




                    </div>
                </div>

        </form>
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
<script>
    // cuentas las palabras que estan escritas y bloque cuando llegan a 200
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.getElementById('biografiaTextarea');
        var wordCountDisplay = document.getElementById('wordCountDisplay');

        textarea.addEventListener('input', function() {
            var words = textarea.value.split(/\s+/).filter(function(word) {
                return word.length > 0;
            });

            var wordCount = words.length;

            // Limita a 20 palabras
            if (wordCount > 200) {
                var trimmedText = words.slice(0, 200).join(' ');
                textarea.value = trimmedText;
                wordCount = 200;
            }

            // Muestra el recuento de palabras en el párrafo
            wordCountDisplay.textContent = 'Palabras: ' + wordCount;
        });
    });
</script>
