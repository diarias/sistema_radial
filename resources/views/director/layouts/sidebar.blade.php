
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand" style="margin-bottom: 20%;">
            <a href="index.html"> <img src="{{ asset('backend/assets/img/login/Imagen_no_disponible.png')}}" width="50%" alt="">
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">Actividades</li>
            <li><a class="nav-link" href="{{route('director.panel')}}"><i class="fas fa-home    "></i>
                    <span>Inicio</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"> <i
                        class="fas fa-calendar    "></i>
                    <span>Calendario</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('director.calendario.entrevistas')}}">Entrevistas</a></li>
                    <li><a class="nav-link" href="{{route('director.calendario-promociones.index')}}">Promociones</a></li>
                    <li><a class="nav-link" href="{{route('director.calendario-menciones.index')}}">Menciones</a></li>
                    <li><a class="nav-link" href="{{route('director.calendario-coberturas.index')}}">Coberturas</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{route('director.entrevistas.index')}}"> <i class="fas fa-book-open    "></i>
                    <span>Entrevista</span></a></li>
            <li><a class="nav-link" href="{{route('director.promociones.index')}}"> <i class="fas fa-bullhorn    "></i>
                    <span>Promociòn</span></a></li>
            <li><a class="nav-link" href="{{route('director.menciones.index')}}"> <i class="fas fa-microphone    "></i>
                    <span>Menciones</span></a></li>
            <li><a class="nav-link" href="{{route('director.coberturas.index')}}"> <i class="fas fa-signal    "></i>
                    <span>Cobertura</span></a></li>

            <li><a class="nav-link" href="reporte.html"> <i class="fas fa-chart-pie    "></i>
                    <span>Reporte</span></a></li>



            <li class="menu-header">Configuraciòn</li>
           <!-- <li><a class="nav-link" href="rol.html"> <i class="fas fa-book-open    "></i>
                    <span>Rol</span></a></li> -->
            <li><a class="nav-link" href="{{route('director.usuario.index')}}"> <i class="fas fa-person-booth    "></i>
                    <span>Talento Humano</span></a></li>
            <li><a class="nav-link" href="{{route('director.programa.index')}}"> <i class="fas fa-project-diagram    "></i>
                    <span>Programas</span></a></li>


        </ul>

    </aside>
</div>