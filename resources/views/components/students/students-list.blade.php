<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 p-4">
            <h1>Lista de Alunos</h1><a href="{{ url('students/create') }}" class="btn btn-primary btn-lg active"
                                       role="button" aria-pressed="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Criar aluno</a>

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
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nr Atec</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Turma</th>
                </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->id}}</th>
                        <td>{{$student->atec_number}}</td>
                        <td>{{$student->name}}</td>
                        <td>
                            @if(sizeof($student->groups) > 0)
                                @foreach($student->groups as $group)
                                    {{$group->name}}
                                @endforeach
                            @else
                                Sem Turma
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('students/' . $student->id) }}" method="POST">
                                    <a href="{{ url('students/' . $student->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('students/' . $student->id . '/edit') }}" type="button"
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
        </div>
    </div>
</div>
