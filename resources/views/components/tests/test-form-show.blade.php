<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Teste</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('tests') }}">Testes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$test->id}}</li>

                </ol>
            </nav>

            <form method="POST" action="{{ url('tests/' . $test->id) }}">
                @csrf

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Data</label>
                    <input
                        type="text"
                        id="date"
                        name="date"
                        readonly
                        class="form-control"
                        value="{{ $test->date }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        readonly
                        class="form-control"
                        value="{{ $test->name }}">
                </div>

                <div class="form-group">
                    <label for="subject" class="font-weight-bold">Tema</label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        readonly
                        class="form-control"
                        value="{{ $test->subject }}">
                </div>

                <h1>Alunos</h1>
                    <table class="table table-striped table-bordered m-4 mx-auto">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Aluno</th>
                            <th scope="col">Turma</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($test->students as $student)
                            <tr class="text-center">
                                <td>{{$student->name}}</td>
                                @foreach($student->groups as $group)
                                    <td>{{$group->name}}</td>
                                @endforeach
                                @if(!is_null($student->pivot->evaluation))
                                    @if($student->pivot->evaluation < 9.5)
                                        <td class="text-danger">{{$student->pivot->evaluation}}</td>
                                    @else
                                        <td class="text-success">{{$student->pivot->evaluation}}</td>
                                    @endif
                                @else
                                    <td class="text-muted">Sem nota atribuida</td>
                                @endif
                                <td class="text-center align-middle">
                                    <div class="pr-1">
                                        <form action="{{ url('students/' . $student->id) }}" method="POST">
                                            <a href="{{ url('students/' . $student->id) }}" type="button"
                                               class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                                Mostrar</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                <a href="{{ url('tests') }}" class="mt-2 mb-5 btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Voltar</a>

            </form>

        </div>
    </div>
</div>
