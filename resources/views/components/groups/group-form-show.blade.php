<div class="container pb-5">
    <div class="row">
        <div class="col-12">
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

                <a href="{{ url('groups') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
