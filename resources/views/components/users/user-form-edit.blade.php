<div class="container pb-5">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Colaborador</h1>

            <form method="POST" action="{{ url('users/' . $user->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Nr Atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        class="form-control"
                        value="{{ $user->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="role" class="font-weight-bold">Cargo</label>
                    <select
                        name="role_id"
                        id="role_id"
                        class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}"
                                    @if($user->role_id == $role->id)
                                    selected
                                @endif> {{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id" class="font-weight-bold">Instituição</label>
                    <select
                        name="institution_id"
                        id="institution_id"
                        class="form-control">
                        @foreach($institutions as $institution)
                            <option value="{{$institution->id}}"
                                    @if($user->institution_id == $institution->id)
                                    selected
                                @endif> {{$institution->zone}}</option>
                        @endforeach
                    </select>
                    @error('institution')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input
                        type="text"
                        id="password"
                        name="password"
                        class="form-control"
                        value="{{ $user->password }}">
                </div>



                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
                <a href="{{ url('users') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
