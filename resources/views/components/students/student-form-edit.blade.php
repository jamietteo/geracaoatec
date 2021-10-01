<div class="container pb-5">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Editar Aluno</h1>

            <form method="POST" action="{{ url('students/' . $student->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Nr Atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        class="form-control"
                        value="{{ $student->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <label for="birthdate" class="font-weight-bold">Data de nascimento</label>
                    <input
                        type="date"
                        id="birthdate"
                        name="birthdate"
                        class="form-control"
                        value="{{ $student->birthdate }}">
                </div>

                <div class="form-group">
                    <label for="student_id" class="font-weight-bold">Turma</label>
                    <select
                        name="group_id"
                        id="group_id"
                        class="form-control">
                        @foreach($student->groups as $group)
                            <option value="{{$group->id}}"
                                    @if($student->group_id == $group->id)
                                    selected
                                @endif> {{$group->name}}</option>
                        @endforeach
                    </select>
                    @error('group')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-primary">Back</a>

            </form>

        </div>
    </div>
</div>
