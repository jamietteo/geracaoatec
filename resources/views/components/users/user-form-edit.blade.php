<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Colaborador</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Colaborador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('users/' . $user->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Nr Atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        class="form-control"
                        value="{{ $user->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="role" class="font-weight-bold">Cargo</label>
                    <select
                        name="role_id"
                        id="role_id"
                        class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}"
                                    @if($user->role_id == $role->id)
                                    selected
                                @endif> {{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id" class="font-weight-bold">Instituição</label>
                    <select
                        name="institution_id"
                        id="institution_id"
                        class="form-control">
                        @foreach($institutions as $institution)
                            <option value="{{$institution->id}}"
                                    @if($user->institution_id == $institution->id)
                                    selected
                                @endif> {{$institution->zone}}</option>
                        @endforeach
                    </select>
                    @error('institution')
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
                    Editar
                </button>

            </form>

        </div>
    </div>
</div>
