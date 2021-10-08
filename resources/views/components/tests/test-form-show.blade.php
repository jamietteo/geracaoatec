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

                <div class="form-group">
                    <label for="group_id" class="font-weight-bold">Turma</label>
                    @foreach($test->groups as $group)
                        <input
                            name="group_id"
                            id="group_id"
                            readonly
                            class="form-control"
                            value="{{$group->name}}">
                    @endforeach
                </div>

                <table class="table table-striped table-bordered m-4 mx-auto">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">Aluno</th>
                        <th scope="col">Turma</th>
                        <th scope="col">Nota</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($test->students as $student)
                        <tr class="text-center">
                            <td>{{$student->name}}</td>

                            @foreach($student->groups as $group)
                                <td>{{$group->name}}</td>
                            @endforeach

                            <td>{{$student->pivot->evaluation}}</td>
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
