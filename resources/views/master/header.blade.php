<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="https://www.atec.pt/"><img src = "{{ asset('images/atec_logo.png') }}"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
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
