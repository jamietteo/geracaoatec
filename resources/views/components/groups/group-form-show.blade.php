<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Visualizar Turma</h1>

            <form method="POST" action="{{ url('groups/' . $group->id) }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        readonly
                        class="form-control"
                        value="{{ $group->name }}">
                </div>

                <div class="form-group">
                    <label for="institution" class="font-weight-bold">Instituição</label>
                    <input
                        type="text"
                        id="institution"
                        name="institution"
                        readonly
                        class="form-control"
                        value="{{ $group->institution->zone }}">
                </div>

                <a href="{{ url('groups') }}" class="mt-2 mb-5 btn btn-primary">
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
