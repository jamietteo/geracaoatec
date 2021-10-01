<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <h1>Editar Colaborador</h1>

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
                    <label for="password" class="font-weight-bold">Password</label>
                    <input
                        type="text"
                        id="password"
                        name="password"
                        readonly
                        class="form-control"
                        value="{{ $user->password }}">
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
                        @endif> <!-- VALIDAR ZONA -->
                </div>

                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
