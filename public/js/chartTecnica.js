window.chartLib = {}

window.chartLib.chartTecnica = (counts) =>{
    const labels = [
        'Porto',
        'Palmela',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label : 'Alunos Seguidos',
            backgroundColor: '#468faf',
            data: counts
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

    const chartTecnica = new Chart(
        document.getElementById('chartTecnica'),
        config
    );
}

