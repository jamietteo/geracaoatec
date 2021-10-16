<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Fichas de Utente</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('userForms') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$userForm->id}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('userForms/' . $userForm->id) }}">
                @csrf

                <div class="form-group">
                    <label for="user" class="font-weight-bold">Colaborador</label>
                    <input
                        type="text"
                        id="user"
                        name="user"
                        readonly
                        class="form-control"
                        value="{{ $userForm->user->name }}">
                </div>

                <div class="form-group">
                    <label for="student" class="font-weight-bold">Aluno</label>
                        <input
                            type="text"
                            id="student"
                            name="student"
                            readonly
                            class="form-control"
                            value=" {{ $userForm->student->name }}">
                </div>

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Data</label>
                    <input
                        type="text"
                        id="date"
                        name="date"
                        readonly
                        class="form-control"
                        value=" {{ $userForm->date }}">
                </div>

                <div class="form-group">
                    <label for="date" class="font-weight-bold">Periodicidade</label>
                    <input
                        type="text"
                        id="periodicity"
                        name="periodicity"
                        readonly
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

            </form>

        </div>
    </div>
</div>
