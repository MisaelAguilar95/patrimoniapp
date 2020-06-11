<script>
   
var enviados = <?=$datos?>.length;
var recibidos = <?=$datos2?>.length;
var atendidos = <?=$datos3?>.length;
var turnados = <?=$datos4?>.length;
console.log(enviados);
console.log(recibidos);
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['ENVIADOS', 'RECIBIDOS', 'ATENDIDOS', 'TURNADOS'],
        datasets: [{
            label: '2020',
            data: [enviados,recibidos,atendidos,turnados],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
                
                
            ],
            borderWidth: 1
        }]
        
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>