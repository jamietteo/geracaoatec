<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Fichas de Utente</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('userForms') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$userForm->id}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('userForms/' . $userForm->id) }}">
                @csrf

                <div class="form-group">
                    <label for="user" class="font-weight-bold">Colaborador</label>
                    <input
                        type="text"
                        id="user"
                        name="user"
                        readonly
                        class="form-control"
                        value="{{ $userForm->user->name }}">
                </div>

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Turma</label>
                    <input
                        type="text"
                        id="group"
                        name="group"
                        readonly
                        class="form-control"
                        value="{{$userForm->student->groups[0]->name}}">
                </div>

                <div class="form-group">
                    <label for="student" class="font-weight-bold">Aluno</label>
                        <input
                            type="text"
                            id="student"
                            name="student"
                            readonly
                            class="form-control"
                            value=" {{ $userForm->student->name }}">
                </div>

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Data</label>
                    <input
                        type="text"
                        id="date"
                        name="date"
                        readonly
                        class="form-control"
                        value=" {{ $userForm->date }}">
                </div>

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Periodicidade</label>
                    <input
                        type="text"
                        id="periodicity"
                        name="periodicity"
                        readonly
                        class="form-control"
                        value=" {{ $userForm->periodicity }}">
                </div>

                @if(sizeof($sessions) != 0)
                    <label class="font-weight-bold">Sessões do utente</label>
                    <table class="table table-striped table-bordered m-4 mx-auto">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Motivo de criação</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sessions as $session)
                            <tr class="text-center">
                                <th scope="row">{{$session->id}}</th>
                                <td>{{$session->reason}}</td>
                                <td>{{$session->begin_time}}</td>
                                <td class="text-center align-middle">
                                    <div class="pr-1">
                                        <form action="{{ url('userForms/' . $session->id) }}" method="POST">
                                            <a href="{{ url('userForms/' . $session->id) }}" type="button"
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
                @else
                    <p class="text-center text-muted h1">
                        Sem sessões criadas
                    </p>
                @endif

                <a href="{{ url('userForms') }}" class="mt-2 mb-5 btn btn-secondary">
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
