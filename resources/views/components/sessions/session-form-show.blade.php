<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Sessões</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('sessions') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$session->id}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('session/' . $session->id) }}">
                @csrf

                <div class="form-group">
                    <label for="user_forms_id " class="font-weight-bold">Nº Ficha de Utente</label>
                    <input
                        type="text"
                        id="user_forms_id "
                        name="user_forms_id "
                        readonly
                        class="form-control"
                        value="{{ $session->user_forms_id }}">
                </div>

                <div class="form-group">
                    <label for="reason" class="font-weight-bold">Motivo de criação</label>
                    <input
                        type="text"
                        id="reason"
                        name="reason"
                        readonly
                        class="form-control"
                        value="{{$session->reason}}">
                </div>

                <div class="form-group">
                    <label for="student" class="font-weight-bold">Aluno</label>
                    <input
                        type="text"
                        id="student"
                        name="student"
                        readonly
                        class="form-control"
                        value="{{ $session->user_forms->student->name}}">
                </div>

                <div class="form-group">
                    <label for="groups" class="font-weight-bold">Turma</label>
                    <input
                        type="text"
                        id="groups"
                        name="groups"
                        readonly
                        class="form-control"
                        value="{{ $session->user_forms->student->groups[0]->name}}">
                </div>

                <div class="form-group">
                    <label for="begin_time" class="font-weight-bold">Data</label>
                    <input
                        type="text"
                        id="begin_time"
                        name="begin_time"
                        readonly
                        class="form-control"
                        value=" {{ $session->begin_time }}">
                </div>

                <div class="form-group">
                    <label for="comments" class="font-weight-bold">Comentários</label>
                    <textarea
                        id="comments"
                        name="comments"
                        readonly
                        rows="3"
                        class="form-control">{{ $session->comments }}</textarea>
                </div>

                <a href="{{ url('sessions') }}" class="mt-2 mb-5 btn btn-secondary">
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
