<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-4">
            <h1>Lista de testes</h1>

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
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Alunos</th>

                </tr>
                </thead>
                <tbody>

                @foreach($tests as $test)
                    <tr class="text-center">
                        <th scope="row">{{$test->id}}</th>
                        <td>{{$test->date}}</td>
                        <td>{{$test->subject}}</td>
                        <td>
                            @foreach($test->students as $student)
                                {{$student->name}}<br>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('tests/' . $test->id) }}" method="POST">
                                    <a href="{{ url('tests/' . $test->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('tests/' . $test->id . '/edit') }}" type="button"
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
