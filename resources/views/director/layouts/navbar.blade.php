<nav class="navbar navbar-expand-lg main-navbar">



    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>




    <ul class="navbar-nav navbar-right">


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(Auth::user()->foto) }}"

                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hola, {{ Auth::user()->nombre }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Propiedades</div>
                <a href="{{route('director.perfil.index')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesiòn
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
