<div class="container pb-5">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Visualizador Colaborador</h1>

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
                    @foreach($user->roles as $role)
                    <input
                        type="text"
                        id="role"
                        name="role"
                        readonly
                        class="form-control"
                        value="{{$role->name}}">
                    @endforeach
                </div>

                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
