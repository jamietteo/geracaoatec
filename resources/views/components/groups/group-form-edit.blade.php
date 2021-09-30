<div class="container pb-5">
    <div class="row">
        <div class="col-12">
            <h1>Editar Turma</h1>

            <form method="POST" action="{{ url('groups/' . $group->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ $group->name }}">
                </div>

                <div class="form-group">
                    <label for="group_id" class="font-weight-bold">Instituição</label>
                    <select
                        name="institution_id"
                        id="institution_id"
                        class="form-control">
                        @foreach($institutions as $institution)
                            <option value="{{$institution->id}}"
                                    @if($group->institution_id == $institution->id)
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

                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</div>
