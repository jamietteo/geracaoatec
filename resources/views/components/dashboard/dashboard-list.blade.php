@if ( session('status') )
    <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
    </div>
@else
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
    @endif
@endif

<div class="container-fluid">
    <h4 class="p-5 text-center">Gráfico de Técnicas por Instituição</h4>
    <div>
        <canvas id="chartTecnica"></canvas>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                window.myChartLib.chartTecnica({{ $counts }})})
        </script>
    </div>

    <h4 class="p-5 text-center">Gráfico do Número de Fichas de Utente por Técnica</h4>
    <div>
        <canvas id="chartUserForms"></canvas>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                window.myChartLib.chartUserForms(@json($countsUserForms))
            })
        </script>
    </div>
</div>

<a href="{{ url('/') }}" class="mt-2 mb-5 btn btn-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
         class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg>
    Voltar</a>
