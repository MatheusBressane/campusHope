document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("graficoPizza").getContext("2d");

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: dadosInstituicoes.nomes,
            datasets: [{
                label: "Total de Alunos",
                data: dadosInstituicoes.totais,
                backgroundColor: [
                    '#4e79a7', '#f28e2c', '#e15759', '#76b7b2',
                    '#59a14f', '#edc948', '#b07aa1', '#ff9da7',
                    '#9c755f', '#bab0ab'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Total de Alunos por Instituição'
                }
            }
        }
    });
});