window.myChartLib = {}

window.myChartLib.chartStudents = (evaluations, medias) =>{
    const labels = [
        '1º teste',
        '2º teste',
        '3º teste',
    ];

    const notas = Object.values(evaluations)
    let soma = [0,0,0]
    for(let i=0;i<medias.length;i++){
        for(let j=0;j<medias[i].length;j++){
            soma[j] += medias[i][j]
        }
    }

    let mediaTurma = []
    for (let i=0;i<medias.length;i++){
        mediaTurma[i] = soma[i]/medias.length
    }

    const data = {
        labels: labels,
        datasets: [{
            label : 'Teste Aluno',
            backgroundColor: ["#468faf","#468faf","#468faf"],
            data: [notas[0],notas[1],notas[2]]
        },
        {
            label : 'Media Turma',
            backgroundColor: ["#adb5bd","#adb5bd","#adb5bd"],
            data: [mediaTurma[0],mediaTurma[1],mediaTurma[2]]
        }]
    };

const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
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



