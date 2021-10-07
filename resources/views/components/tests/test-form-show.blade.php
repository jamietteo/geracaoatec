<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Visualizador Colaborador</h1>

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
                    <label for="subject" class="font-weight-bold">Tema</label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        readonly
                        class="form-control"
                        value="{{ $test->subject }}">
                </div>

                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Voltar</a>

            </form>

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

        </div>
    </div>
</div>
