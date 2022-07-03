<?php

use common\models\InstitutiiServicii;
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
                    $structuraSubordonata = \common\models\InstitutiiStructuriSubordonate::findOne(Yii::$app->user->identity->institutie_subordonata_id);
                    echo $structuraSubordonata->institutie_denumire_iss;
                    ?>
                </span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3">
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
            <div class="col-3">
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
            <div class="col-3">
                <?php
                    $tipuriServicii = \common\models\StructuriSubordonateServicii::find()
                        ->where(['structura_subordonata_id_sss' => Yii::$app->user->identity->institutie_subordonata_id])
                        ->select(['serviciu_id_sss'])
                        ->all();
                    $servicii_list = array_column($tipuriServicii, 'serviciu_id_sss');
                ?>
                <?= Select2::widget([
                    'name' => 'serviciu_id',
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\TipuriServiciu::find()
                        ->where(['in', 'id', $servicii_list])
                        ->orderBy(['tip_serviciu_denumire' => SORT_ASC])
                        ->all(), 'id', 'tip_serviciu_denumire'),
                    'options' => ['placeholder' => 'Tip serviciu ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-3">
                <?php

                ?>
                <?= Select2::widget([
                    'name' => 'punct_lucru_id',
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\StructuriSubordonatePuncteLucru::find()
                        ->where(['structura_subordonata_id_sspl' => Yii::$app->user->identity->institutie_subordonata_id])
                        ->orderBy(['localitate_id_sspl' => SORT_ASC])
                        ->all(), 'id_sspl', function($model){

                        $localitate = \common\models\Localitate::findOne($model->localitate_id_sspl);

                        return $localitate->localitate_nume.'-'.$model->strada_sspl.'-'.$model->numar_strada_sspl;
                    }),
                    'options' => ['placeholder' => 'Punct de lucru ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
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
        const serviciu_id = $('#w2').val();
        const punct_lucru_id = $('#w3').val();

        let dataToSend = {
            _data_inceput: data_inceput,
            _data_sfarsit: data_sfarsit,
            _serviciu_id: serviciu_id,
            _punct_lucru_id: punct_lucru_id
        };

        $.ajax({
            url: "index.php?r=programare/get-statistici-structura",
            type: "POST",
            data: {
                _data: dataToSend
            },
            success: function (response) {
                $("canvas#myChart").remove();
                $("div.chartreport").append(`<canvas id="myChart" width="200" height="100"></canvas>`);

                const ctx = document.getElementById('myChart');
                let myChart = new Chart(ctx, {
                    // bar, line, mixed
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
