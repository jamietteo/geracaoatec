<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <h1>Adicionar Turma</h1>

            <form method="POST" action="{{ url('groups') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Turma</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        autocomplete="name"
                        placeholder="Sigla da turma"
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
                    <label for="institution" class="font-weight-bold">Instituição</label>
                    <div>
                        <select
                            id="institution_id"
                            name="institution_id"
                            class="form-select custom-select
                            @error('institution') is-invalid @enderror"
                            aria-describedby="institutionHelp">

                            @foreach($institutions as $institution)
                                <option value = " {{ $institution->id }} ">
                                    {{ $institution->zone }}
                                </option>
                            @endforeach

                            @error('institution')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </select>
                    </div>
                </div>

                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
                <a href="{{ url('groups') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
