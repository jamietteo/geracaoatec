<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Criar Ficha de Utente</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('userForms') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Criar Ficha de Utente</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('userForms') }}">
                @csrf

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Colaboradores</label>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            aria-describedby="studentHelp"
                            value="{{Auth::user()->name}}"
                            disabled>
                    </div>

                    <div class="form-group">
                        <input
                            type="hidden"
                            id="user_id"
                            name="user_id"
                            autocomplete="user_id"
                            class="form-control
                        @error('user_id') is-invalid @enderror"
                            value="{{ Auth::user()->id }}"
                            required
                            aria-describedby="dateHelp"
                            readonly>

                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                @if(is_countable($students))
                    <div class="form-group">
                        <label for="student_id" class="font-weight-bold">Alunos</label>
                        <div>
                            <select
                                id="student_id"
                                name="student_id"
                                class="form-select custom-select
                                @error('student_id') is-invalid @enderror"
                                aria-describedby="studentHelp">

                                @foreach($students as $student)
                                    <option value=" {{ $student->id }} ">
                                        {{$student->atec_number}} - {{ $student->name }} -
                                        @foreach($student->groups as $group)
                                            {{$group->name}}
                                        @endforeach
                                    </option>
                                @endforeach

                                @error('student_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </select>
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <label class="font-weight-bold">Nome do aluno</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $students->name }}"
                        aria-describedby="dateHelp"
                        readonly>
                    </div>

                    <div class="form-group">
                        <input
                            type="hidden"
                            id="student_id"
                            name="student_id"
                            autocomplete="student_id"
                            class="form-control
                        @error('date') is-invalid @enderror"
                            value="{{ $students->id }}"
                            required
                            aria-describedby="dateHelp"
                            readonly>

                        @error('student_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                @endif

                    <div class="form-group">
                        <label for="date" class="font-weight-bold">Data</label>
                        <input
                            type="date"
                            id="date"
                            name="date"
                            autocomplete="date"
                            placeholder="Data"
                            min="{{now()->format("Y-m-d")}}"
                            class="form-control
                        @error('date') is-invalid @enderror"
                            value="{{ old('date') }}"
                            required
                            aria-describedby="dateHelp">

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Periodicidade</label>
                        <input
                            type="text"
                            id="periodicity"
                            name="periodicity"
                            autocomplete="periodicity"
                            placeholder="Periodicidade"
                            class="form-control
                        @error('periodicity') is-invalid @enderror"
                            value="{{ old('periodicity') }}"
                            required
                            aria-describedby="nameHelp">

                        @error('periodicity')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>


                    <a href="{{ url('userForms') }}" class="mt-2 mb-5 btn btn-secondary">
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
                        Criar
                    </button>
                </form>

        </div>
    </div>
</div>

