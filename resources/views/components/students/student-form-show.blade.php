<div class="container pb-5">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Aluno</h1>

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

                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
