<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Criar Teste</h1>

            <form method="POST" action="{{ url('tests') }}">
                @csrf
                <div class="form-group">
                    <label for="date" class="font-weight-bold">Data</label>
                    <input
                        type="date"
                        id="date"
                        name="date"
                        autocomplete="date"
                        placeholder="Data"
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
                    <label for="subject" class="font-weight-bold">Tema</label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        autocomplete="subject"
                        placeholder="Tema"
                        class="form-control
                        @error('subject') is-invalid @enderror"
                        value="{{ old('subject') }}"
                        required
                        aria-describedby="subjectHelp">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Turma</label>
                    <div>
                        <select
                            id="group_id"
                            name="group_id"
                            class="form-select custom-select
                            @error('group') is-invalid @enderror"
                            aria-describedby="groupHelp">

                            @foreach($groups as $group)
                                <option value = " {{ $group->id }} ">
                                    {{ $group->name }}
                                </option>
                            @endforeach

                            @error('group')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </select>
                    </div>
                </div>


                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-primary">
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
