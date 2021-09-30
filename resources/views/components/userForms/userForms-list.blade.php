<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Lista de Fichas de utente</h1>

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
                    <th scope="col">Data</th>
                    <th scope="col">Periodicidade</th>
                </tr>
                </thead>
                <tbody>

                @foreach($userForms as $userForm)
                    <tr>
                        <th scope="row">{{$userForm->id}}</th>
                        <td>{{$userForm->date}}</td>
                        <td>{{$userForm->periodicity}}</td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('userForms/' . $userForm->id) }}" method="POST">
                                    <a href="{{ url('userForms/' . $userForm->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('userForms/' . $userForm->id . '/edit') }}" type="button"
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
