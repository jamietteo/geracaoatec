<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Lista de Colaboradores</h1><a href="{{url('register')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Criar Colaborador</a>

            @if ( session('status') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nr Atec</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cargo</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->atec_number}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @foreach($user->roles as $role)
                                    {{ $role->name }}
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('users/' . $user->id) }}" method="POST">
                                    <a href="{{ url('users/' . $user->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('users/' . $user->id . '/edit') }}" type="button"
                                       class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
