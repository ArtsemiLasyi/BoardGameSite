        <a class="a" href="labs.php?page=lab8&time_period=day">День</a>
        <a class="a" href="labs.php?page=lab8&time_period=week">Неделя</a>
        <a class="a" href="labs.php?page=lab8&time_period=month">Месяц</a>
        <a class="a" href="labs.php?page=lab8&time_period=year">Год</a><br>
            <canvas id="myChart" width="400" height="400"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
            <script>
                (async function () {
                    let dateData = <?php echo json_encode($rows);?>;
                    const values = dateData.filter((_, index)=>index%2==0);
                    const keys = dateData.filter((_, index)=>index%2!=0)
                    let ctx = document.getElementById('myChart').getContext('2d');
                    let myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: keys,
                            datasets: [{
                                label: '# of Votes',
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(255, 206, 86, 0.5)',
                                    'rgba(75, 192, 192, 0.5)',
                                    'rgba(153, 102, 255, 0.5)',
                                    'rgba(255, 159, 64, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
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
                })()
            </script>
