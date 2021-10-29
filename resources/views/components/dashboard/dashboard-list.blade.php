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
