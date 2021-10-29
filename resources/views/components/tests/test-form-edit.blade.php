<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Teste</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('tests') }}">Testes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$test->id}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('tests/' . $test->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Data</label>
                    <input
                        type="date"
                        id="date"
                        name="date"
                        min="{{now()->format("Y-m-d")}}"
                        class="form-control"
                        value="{{ $test->date }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ $test->name }}">
                </div>

                <div class="form-group">
                    <label for="subject" class="font-weight-bold">Tema</label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        class="form-control"
                        value="{{ $test->subject }}">
                </div>

                <div class="form-group">
                    <label for="group_id" class="font-weight-bold">Turma</label>
                    <select
                        name="group_id"
                        id="group_id"
                        class="form-control">
                        @foreach($groups as $group)
                            <option value="{{$group->id}}"
                                @foreach($test->students as $student)
                                    @foreach($student->groups as $student_group)
                                        @if($student_group->id == $group->id)
                                            selected
                                        @endif
                                    @endforeach
                                @endforeach> {{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="checkbox" aria-label="Checkbox for following text input" onchange="Inserir()">
                    <label class="font-weight-bold">Inserir notas</label>
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

                            <td>
                                <input
                                    readonly
                                    type="text"
                                    id="evaluation"
                                    name="evaluation[{{$student->id}}]"
                                    class="form-control"
                                    pattern="^(?:1?\d(?:\.\d{1,2})?|20(?:\.0?0?)?)$"
                                    value="{{ $student->pivot->evaluation }}">
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
                <button type="submit" class="mt-2 mb-5 btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-check2" viewBox="0 0 16 16">
                        <path
                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Editar
                </button>

            </form>

        </div>
    </div>
</div>

<script>
    function Inserir()
    {
        //console.log(document.querySelectorAll('#evaluation'))
        var i = 0;
        for(i<0; i<=document.querySelectorAll('#evaluation').length; i++)
            //if(!document.querySelectorAll('#evaluation')[i].removeAttribute('readonly'))
            document.querySelectorAll('#evaluation')[i].removeAttribute('readonly')
    }
</script>
