<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-4">
            <h1>Lista de Fichas de utente</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Utentes</li>
                </ol>
            </nav>

            @if ( session('status') )
                <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            @endif

            <table class="table table-striped table-bordered m-4 mx-auto">
                <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">Periodicidade</th>
                </tr>
                </thead>
                <tbody>

                @foreach($userForms as $userForm)
                    <tr class="text-center">
                        <th scope="row">{{$userForm->id}}</th>
                        <td>{{$userForm->date}}</td>
                        <td>{{$userForm->periodicity}}</td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('userForms/' . $userForm->id) }}" method="POST" onsubmit="return confirm('Deseja eliminar a ficha de utente número {{$userForm->id}}?')">
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
