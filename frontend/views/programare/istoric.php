<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista programări la care aveți acces.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-index">

    <h1 class="text-center">
        <?= Html::encode($this->title) ?>
    </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Minister',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Institutie',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],

            [
                'label' => 'Structura',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    if ($model->programare_structura_subordonata) {
                        return \common\models\InstitutiiStructuriSubordonate::findOne($model->programare_structura_subordonata)->institutie_denumire_iss;
                    }
                    return '-';

                }
            ],

            [
                'label' => 'Serviciu',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->serviciu->tip_serviciu_denumire;
                }
            ],

            [
                'label' => 'Localitate',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],

            [
                'label' => 'Data și ora',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return date('d-m-Y H:i', strtotime($model->programare_datetime));
                }
            ],

            [
                'label' => 'Număr unic',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->programare_numar_unic) {
                        return $model->programare_numar_unic;
                    }
                    return '<span class="text-danger font-italic font-weight-bold">Neatribuit ...</span>';

                }
            ],
            [
                'label' => 'Data finalizării',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="font-weight-bold text-success">'.$model->programare_data_finalizare.'</span>';
                }
            ]
        ],
    ]); ?>
</div>

<?php $this->registerJsFile("@web/js/plugins/views/programare/index.js"); ?>
