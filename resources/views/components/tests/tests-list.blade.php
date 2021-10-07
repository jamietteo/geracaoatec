<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-4">
            <h1>Lista de testes</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('groups') }}">Turmas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Testes</li>

                </ol>
            </nav>

            <a href="{{ url('tests/create') }}" class="btn btn-primary btn-lg active"
               role="button" aria-pressed="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Criar Teste</a>

            @if ( session('status') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            @endif

            <table class="table table-striped table-bordered m-4 mx-auto">
                <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Turma</th>

                </tr>
                </thead>
                <tbody>

                @foreach($tests as $test)
                    <tr class="text-center">
                        <th scope="row">{{$test->id}}</th>
                        <td>{{$test->date}}</td>
                        <td>{{$test->subject}}</td>
                        <td>
                            @foreach($test->groups as $group)
                                {{$group->name}}<br>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('tests/' . $test->id) }}" method="POST">
                                    <a href="{{ url('tests/' . $test->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('tests/' . $test->id . '/edit') }}" type="button"
                                       class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

            <a href="{{ url('groups') }}" class="mt-2 mb-5 btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                     class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Voltar</a>
        </div>
    </div>
</div>
