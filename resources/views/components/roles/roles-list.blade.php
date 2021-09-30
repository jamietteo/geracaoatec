<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Lista de cargos</h1>

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
                    <th scope="col">Cargo</th>
                </tr>
                </thead>
                <tbody>

                @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$role->id}}</th>
                        <td>{{$role->name}}</td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('roles/' . $role->id) }}" method="POST">
                                    <a href="{{ url('roles/' . $role->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('roles/' . $role->id . '/edit') }}" type="button"
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
