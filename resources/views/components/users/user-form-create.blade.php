<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <h1>Adicionar Colaborador</h1>

            <form method="POST" action="{{ url('users') }}">
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
                        placeholder="Nome do técnico"
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

                <div class="form-group">
                    <label for="role" class="font-weight-bold">Cargo</label>
                    <div>
                        <select
                            id="role_id"
                            name="role_id"
                            class="form-select custom-select
                            @error('role') is-invalid @enderror"
                            aria-describedby="roleHelp">

                            @foreach($roles as $role)
                                <option value = " {{ $role->id }} ">
                                    {{ $role->name }}
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

                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input
                        type="text"
                        id="password"
                        name="password"
                        autocomplete="password"
                        placeholder="Password"
                        class="form-control
                        @error('password') is-invalid @enderror"
                        value="{{ old('password') }}"
                        required
                        aria-describedby="passwordHelp">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-primary">Back</a>
            </form>

        </div>
    </div>
</div>
