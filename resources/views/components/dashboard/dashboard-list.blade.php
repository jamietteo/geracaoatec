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
