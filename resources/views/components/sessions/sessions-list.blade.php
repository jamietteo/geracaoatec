<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-4">
            <h1>Lista de Sessões</h1>

            @if ( session('status') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            @endif

            <table class="table table-striped table-bordered m-4 mx-auto">
                <thead>
                <tr class="text-center">
                    <th scope="col">Nº Sessão</th>
                    <th scope="col">Nº Ficha de Utente</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Data</th>

                </tr>
                </thead>
                <tbody>

                @foreach($sessions as $session)
                    <tr class="text-center">
                        <th scope="row">{{$session->session_number}}</th>
                        <td>{{$session->user_forms_id}}</td>
                        <td>{{$session->comments}}</td>
                        <td>{{$session->begin_time}}</td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('sessions/' . $session->id) }}" method="POST">
                                    <a href="{{ url('sessions/' . $session->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('sessions/' . $session->id . '/edit') }}" type="button"
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
