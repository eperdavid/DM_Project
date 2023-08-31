const ctx = document.getElementById('myChart');

var data = [12,15,11];

new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Lakás', 'Ház', 'Telek'],
      datasets: [{
        label: '# of Votes',
        data: data,
        backgroundColor: [
            '#286DF3',
            '#1cc88a',
            '#36b9cc'
          ],
        borderWidth: 1
      }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 30,
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            }
        }
    }
  });
