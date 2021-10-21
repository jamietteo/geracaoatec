<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Criar Colaborador</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Colaborador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Criar Colaborador</li>
                </ol>
            </nav>

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
                        placeholder="Nome do colaborador"
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
                    <label for="email" class="font-weight-bold">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        pattern="[a-zA-Z]+[.]+[a-zA-Z]+(.[/\d/]+@|@)+edu.atec.pt"
                        autocomplete="email"
                        placeholder="Email"
                        class="form-control
                        @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required
                        aria-describedby="emailHelp">

                    @error('email')
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
                        type="password"
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



                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-secondary">
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
