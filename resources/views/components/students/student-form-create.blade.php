<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <h1>Adicionar aluno</h1>

            <form method="POST" action="{{ url('students') }}">
                @csrf
                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Número da atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        autocomplete="atec_number"
                        placeholder="Número da atec"
                        class="form-control
                        @error('atec_number') is-invalid @enderror"
                        value="{{ old('atec_number') }}"
                        required
                        aria-describedby="atec_numberHelp">

                    @error('atec_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        autocomplete="name"
                        placeholder="Nome do aluno"
                        class="form-control
                        @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        required
                        aria-describedby="nameHelp">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birthdate" class="font-weight-bold">Data de nascimento</label>
                    <input
                        type="date"
                        id="birthdate"
                        name="birthdate"
                        autocomplete="birthdate"
                        placeholder="Data de nascimento"
                        class="form-control
                        @error('birthdate') is-invalid @enderror"
                        value="{{ old('birthdate') }}"
                        required
                        aria-describedby="birthdateHelp">

                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-student">
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

                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
