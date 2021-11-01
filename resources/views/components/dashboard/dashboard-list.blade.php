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

<div class="container-fluid" id="graficos">
    <div>
        <h1 class="p-5 text-center">Gráfico de Alunos Seguidos por Instituição</h1>
        <canvas id="chartTecnica"></canvas>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                window.myChartLib.chartTecnica({{ $counts }})})

            function saveAsPDF() {
                html2canvas(document.getElementById("chartTecnica"), {
                    onrendered: function(canvas) {
                        var img = canvas.toDataURL(); //image data of canvas
                        var doc = new jsPDF();
                        doc.addImage(img, 10, 10, 180, 150);
                        doc.save('GráficodeTécnicasporInstituição.pdf');
                    }
                });
            }
        </script>
        <button class="mt-2 mb-5 btn btn-outline-primary" onclick="saveAsPDF();">Download PDF</button>
    </div>



    <div>
        <h1 class="p-5 text-center">Gráfico do Número de Fichas de Utente por Técnica</h1>
        <canvas id="chartUserForms"></canvas>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                window.myChartLib.chartUserForms(@json($countsUserForms))
            })

            function saveAsPDF2() {
                html2canvas(document.getElementById("chartUserForms"), {
                    onrendered: function(canvas) {
                        var img = canvas.toDataURL(); //image data of canvas
                        var doc = new jsPDF();
                        doc.addImage(img, 10, 10, 180, 150);
                        doc.save('GráficodoNúmerodeFichasdeUtenteporTécnica.pdf');
                    }
                });
            }
        </script>
        <button class="mt-2 mb-5 btn btn-outline-primary" onclick="saveAsPDF2();">Download PDF</button>
    </div>



<a href="{{ url('/') }}" class="mt-2 mb-5 btn btn-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
         class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg>
    Voltar</a>
</div>
