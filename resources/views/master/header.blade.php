<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{url('/')}}"><img src = "{{ asset('images/atec_logo.png') }}"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            @if(Auth::user())
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Olá {{ Auth::user()->name }}!
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endif
            @if(!Auth::user())
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endif

        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="sidebar-sticky pt-5">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span data-feather="bar-chart-2"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('userForms') }}">
                            <span data-feather="file"></span>
                            Acompanhamento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('tests') }}">
                            <span data-feather="pie-chart"></span>
                            Análise de Softskills
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('groups') }}">
                            <span data-feather="users"></span>
                            Turmas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('students') }}">
                            <span data-feather="user"></span>
                            Alunos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users') }}">
                            <span data-feather="layers"></span>
                            Colaboradores
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
