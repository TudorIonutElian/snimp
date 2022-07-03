<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = 'Statistici';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-update">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-2">
                <span class="bg-primary text-white px-2 py-2 rounded">
                    Statistici la nivelul
                    <?php

                    ?>
                </span>
            </div>
            <div class="col-12">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

</div>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Servicii de Telecomunicații', 'Servicii de Administrație', 'Servicii de Apărare Națională', 'Servicii de Protecție Civilă', 'Servicii de Mediu', 'Serviciul 6'],
            datasets: [{
                label: 'Număr programări 01.01.2022 - 30.05.2022',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
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
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
