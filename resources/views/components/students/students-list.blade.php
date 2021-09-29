<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Lista de Alunos</h1>

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
                </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->id}}</th>
                        <td>{{$student->atec_number}}</td>
                        <td>{{$student->name}}</td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('categories/' . $student->id) }}" method="POST">
                                    <a href="{{ url('categories/' . $student->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('categories/' . $student->id . '/edit') }}" type="button"
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
