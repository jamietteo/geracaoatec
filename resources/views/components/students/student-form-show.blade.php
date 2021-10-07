<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Aluno</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('groups') }}">Turmas</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('students') }}">Alunos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$student->name}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('students/' . $student->id) }}">
                @csrf

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Nr Atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        readonly
                        class="form-control"
                        value="{{ $student->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        readonly
                        class="form-control"
                        value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Turma</label>
                    @foreach($student->groups as $group)
                    <input
                        type="text"
                        id="group"
                        name="group"
                        readonly
                        class="form-control"
                        value="{{ $group->name}}" >
                    @endforeach
                </div>

                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-secondary">
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
