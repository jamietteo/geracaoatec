@extends('master.main')

@section('content')


    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
    @endif

    <h1 class="text-center pt-5">Olá, {{Auth::user()->name}}!</h1>

    @if(Auth::user()->role_id == '1')
<div class="p-5">
    <div class="row p-5">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('userForms') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="file"></span></h5>
                        <h4 class="card-text">
                            Fichas de Utentes
                        </h4>
                        <h5 class="card-text"> Visualize as fichas de utente existentes</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('sessions') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="activity"></span></h5>
                        <h4 class="card-text">
                            Sessões
                        </h4>
                        <h5 class="card-text"> Visualize as sessões</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('tests') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="pie-chart"></span></h5>
                        <h4 class="card-text">
                            Testes
                        </h4>
                        <h5 class="card-text"> Visualize os testes ou faça marcações e insira as notas</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="bar-chart-2"></span></h5>
                        <h4 class="card-text">
                            Dashboard
                        </h4>
                        <h5 class="card-text">Gráficos relativos aos técnicos</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('groups') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="users"></span></h5>
                        <h4 class="card-text">
                            Turmas
                        </h4>
                        <h5 class="card-text"> Visualize ou crie turmas e associe a instituição</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('students') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="user"></span></h5>
                        <h4 class="card-text">
                            Alunos
                        </h4>
                        <h5 class="card-text">Visualize ou crie alunos e associe-os as turmas</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('users') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="layers"></span></h5>
                        <h4 class="card-text">
                            Colaboradores
                        </h4>
                        <h5 class="card-text">Visualize ou crie colaboradores e associe um cargo e uma instituição</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-4 text-center">
            <a class="text-decoration-none text-light" href="{{ url('roles') }}">
                <div class="card bg-dark border border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="award"></span></h5>
                        <h4 class="card-text">
                            Cargos
                        </h4>
                        <h5 class="card-text">Crie ou elimine cargos</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif

    @if(Auth::user()->role_id != '1')
        <div class="p-5">
            <div class="row p-5">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xs-4 text-center">
                    <a class="text-decoration-none text-light" href="{{ url('userForms') }}">
                        <div class="card bg-dark border border-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="file"></span></h5>
                                <h4 class="card-text">
                                    Fichas de Utentes
                                </h4>
                                <h5 class="card-text"> Visualize as fichas de utente existentes</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xs-4 text-center">
                    <a class="text-decoration-none text-light" href="{{ url('sessions') }}">
                        <div class="card bg-dark border border-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="activity"></span></h5>
                                <h4 class="card-text">
                                    Sessões
                                </h4>
                                <h5 class="card-text"> Visualize as sessões</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xs-4 text-center">
                    <a class="text-decoration-none text-light" href="{{ url('tests') }}">
                        <div class="card bg-dark border border-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="pie-chart"></span></h5>
                                <h4 class="card-text">
                                    Testes
                                </h4>
                                <h5 class="card-text"> Visualize os testes ou faça marcações e insira as notas</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row p-5">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xs-4 text-center">
                    <a class="text-decoration-none text-light" href="{{ url('groups') }}">
                        <div class="card bg-dark border border-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="users"></span></h5>
                                <h4 class="card-text">
                                    Turmas
                                </h4>
                                <h5 class="card-text"> Visualize ou crie turmas e associe a instituição</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xs-4 text-center">
                    <a class="text-decoration-none text-light" href="{{ url('students') }}">
                        <div class="card bg-dark border border-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="user"></span></h5>
                                <h4 class="card-text">
                                    Alunos
                                </h4>
                                <h5 class="card-text">Visualize ou crie alunos e associe-os as turmas</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xs-4 text-center">
                    <a class="text-decoration-none text-light" href="{{ url('users') }}">
                        <div class="card bg-dark border border-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center"><span style="height: 50px; width: 50px" data-feather="layers"></span></h5>
                                <h4 class="card-text">
                                    Colaboradores
                                </h4>
                                <h5 class="card-text">Visualize ou crie colaboradores e associe um cargo e uma instituição</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
    @endif
@endsection
