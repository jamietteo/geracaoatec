window.myChartLib = {}

window.myChartLib.chartStudents = (evaluations) =>{
    const labels = [
        'Nota aluno',
        'Media Turma',
        'Nota aluno',
        'Media Turma',
        'Nota aluno',
        'Media Turma',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Testes',
            backgroundColor: 'rgb(51, 153, 255)',
            borderColor: 'rgb(0, 0, 0)',
            data: evaluations,
        }]
    };

const config = {
    type: 'bar',
    data: data,
    options: {
        y: {
            min: 0,
            max: 20,
            ticks: {
                stepSize: 1
            }
        }
    }
};

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
}




