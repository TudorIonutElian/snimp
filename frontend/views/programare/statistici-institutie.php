<?php

use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = 'Statistici';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-update">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-2">
                <span class="bg-info text-white px-2 py-2 rounded">
                    Statistici la nivelul Ministerului
                    <?php
                    $institutie = \common\models\Institutie::findOne(Yii::$app->user->identity->institutie_id);
                    echo $institutie->institutie_denumire;
                    ?>
                </span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-4">
                <?= DatePicker::widget([
                    'name' => 'data_inceput',
                    'language' => 'en',
                    'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Data de început'],
                    'pluginOptions' => [
                        'format' => 'dd-MM-yyyy',
                        'todayHighlight' => true
                    ]
                ]); ?>
            </div>
            <div class="col-4">
                <?= DatePicker::widget([
                    'name' => 'data_sfarsit',
                    'language' => 'en',
                    'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'dd-MM-yyyy',
                        'todayHighlight' => true
                    ]
                ]); ?>
            </div>
            <div class="col-4">
                <?= Select2::widget([
                    'name' => 'structura_id',
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\InstitutiiStructuriSubordonate::find()
                        ->where(['institutie_parinte_iss' => Yii::$app->user->identity->institutie_id])
                        ->orderBy(['institutie_denumire_iss' => SORT_ASC])
                        ->all(), 'id_iss', 'institutie_denumire_iss'),
                    'options' => ['placeholder' => 'Selectează structura ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <button class="btn btn-primary btn-block" id="afiseaza_statistici">Afișează statistici</button>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 chartreport">
                <canvas id="myChart" width="300" height="100"></canvas>
            </div>
        </div>
    </div>

</div>

<script>
    $('body').on('click', '#afiseaza_statistici', function () {
        const data_inceput = $('#w0').val();
        const data_sfarsit = $('#w1').val();
        const structura_id = $('#w2').val();

        let dataToSend = {
            _data_inceput: data_inceput,
            _data_sfarsit: data_sfarsit,
            _structura_id: structura_id,
        }

        $.ajax({
            url: "index.php?r=programare/get-statistici-institutie",
            type: "POST",
            data: {
                _data: dataToSend
            },
            success: function (response) {
                $("canvas#myChart").remove();
                $("div.chartreport").append(`<canvas id="myChart" width="300" height="100"></canvas>`);

                const ctx = document.getElementById('myChart');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: `Număr programări în perioada ${data_inceput}-${data_sfarsit}`,
                            data: response.numar_programari,
                            backgroundColor: response.background_colors,
                            borderColor: response.background_colors,
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
            }
        });
    });

</script>
