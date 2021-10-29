<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Sessões</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('sessions') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$session->id}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('sessions/' . $session->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="reason" class="font-weight-bold">Motivo de criação</label>
                    <input
                        type="text"
                        id="reason"
                        name="reason"
                        class="form-control"
                        value="{{$session->reason}}">
                </div>

                <div class="form-group">
                    <label for="begin_time" class="font-weight-bold">Data</label>
                    <input
                        type="datetime-local"
                        id="begin_time"
                        name="begin_time"
                        class="form-control"
                        value="{{ date('Y-m-d\TH:i', strtotime($session->begin_time)) }}">
                </div>

                <div class="form-group">
                    <label for="comments" class="font-weight-bold">Comentários</label>
                    <textarea
                        id="comments"
                        name="comments"
                        rows="3"
                        class="form-control">{{$session->comments}}</textarea>
                </div>

                <a href="{{ url('sessions') }}" class="mt-2 mb-5 btn btn-secondary">
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


