<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Aluno</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('students') }}">Alunos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$student->name}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('students/' . $student->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Número da atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        class="form-control"
                        value="{{ $student->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <label for="birthdate" class="font-weight-bold">Data de nascimento</label>
                    <input
                        type="date"
                        id="birthdate"
                        name="birthdate"
                        max="{{now()->addYear(-14)->format('Y-m-d')}}"
                        class="form-control"
                        value="{{ $student->birthdate }}">
                </div>

                <div class="form-group">
                    <label for="student_id" class="font-weight-bold">Turma</label>
                    <select
                        name="group_id"
                        id="group_id"
                        class="form-control">
                        @foreach($groups as $group)
                            <option value="{{$group->id}}"
                                @foreach($student->groups as $student_group)
                                    @if($student_group->id == $group->id)
                                    selected
                                    @endif
                                @endforeach> {{$group->name}}</option>
                        @endforeach
                    </select>
                    @error('group')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-secondary">
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
