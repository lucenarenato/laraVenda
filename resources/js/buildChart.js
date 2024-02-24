import Chart from 'chart.js/auto'

async function buildChart() {
    const chart = document.getElementById('chart');

    new Chart(chart, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [
                {
                    label: 'Ganho',
                    backgroundColor: '#54e87b',
                    data: [10, 90, 70, 40, 30, 20, 60, 70, 40, 80, 20, 90],
                },
                {
                    label: 'Gasto',
                    backgroundColor: '#f03737',
                    data: [50, 40, 50, 80, 20, 90, 40, 40, 70, 20, 30, 70],
                },
            ]
        },
    });
}

buildChart();
