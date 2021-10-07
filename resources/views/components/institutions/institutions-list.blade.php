<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 p-4">
            <h1>Instituições</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Instituições</li>
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
                    <th scope="col">Zona</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>

                @foreach($institutions as $institution)
                    <tr class="text-center">
                        <th scope="row">{{$institution->id}}</th>
                        <td>{{$institution->zone}}</td>
                        <td class="text-center align-middle">
                            <div class="pr-1">
                                <form action="{{ url('institutions/' . $institution->id) }}" method="POST"  onsubmit="return confirm('Deseja eliminar a instituição de {{$institution->zone}}?')">
                                    <a href="{{ url('institutions/' . $institution->id) }}" type="button"
                                       class="btn btn-success">Show</a>
                                    <a href="{{ url('institutions/' . $institution->id . '/edit') }}" type="button"
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
