window.myChartLib = {}

window.myChartLib.chartStudents = (evaluations, medias) =>{
    const labels = [
        'Nota aluno',
        'Media Turma',
        'Nota aluno',
        'Media Turma',
        'Nota aluno',
        'Media Turma',
    ];
    let soma = [0,0,0]
    let media = []
    for(let i=0;i<medias.length;i++){
        for(let j=0;j<medias[i].length;j++){
            soma[j] += medias[i][j]
        }
    }
    let mediaTurma = []
    for (let i=0;i<medias.length;i++){
        mediaTurma[i] = soma[i]/medias.length
    }

    const notas = Object.values(evaluations)
    const data = {
        labels: labels,
        datasets: [{
            label: 'Testes',
            backgroundColor: 'rgb(51, 153, 255)',
            borderColor: 'rgb(0, 0, 0)',
            data: [notas[0], media[0], notas[1], media[1], notas[2], media[2]]
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




