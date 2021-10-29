<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Fichas de Utente</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('userForms') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$userForm->id}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('userForms/' . $userForm->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="user_id" class="font-weight-bold">Colaborador</label>
                    <select
                        id="user_id"
                        name="user_id"
                        class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}"
                                    @if($user->userForm_id == $user->id)
                                    selected
                                @endif>{{$user->name}}</option>
                        @endforeach
                    </select>
                    @error('user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="date" class="font-weight-bold">Data</label>
                    <input
                        type="date"
                        id="date"
                        name="date"
                        min="{{now()->format("Y-m-d")}}"
                        class="form-control"
                        value="{{ $userForm->date }}">
                </div>

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Periodicidade</label>
                    <input
                        type="text"
                        id="periodicity"
                        name="periodicity"
                        selected
                        class="form-control"
                        value=" {{ $userForm->periodicity }}">
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
                    Editar
                </button>

            </form>

        </div>
    </div>
</div>
