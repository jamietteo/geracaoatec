<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Colaborador</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Colaborador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('users/' . $user->id) }}">
                @csrf

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Nr Atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        readonly
                        class="form-control"
                        value="{{ $user->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        readonly
                        class="form-control"
                        value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        readonly
                        class="form-control"
                        value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="institution" class="font-weight-bold">Instituição</label>
                    <input
                        type="text"
                        id="institution"
                        name="institution"
                        readonly
                        class="form-control"
                        @if(!is_null($user->institution))
                            value="{{ $user->institution->zone }}"
                        @endif>
                </div>

                <div class="form-group">
                    <label for="role" class="font-weight-bold">Cargo</label>
                    <input
                        type="text"
                        id="role"
                        name="role"
                        readonly
                        class="form-control"
                        @if(!is_null($user->role))
                        value="{{ $user->role->name }}"
                        @endif>
                </div>

                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Voltar</a>

            </form>

        </div>
    </div>
</div>
