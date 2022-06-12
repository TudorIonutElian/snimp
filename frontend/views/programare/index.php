<?php

use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;
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
                        'vertical-aling' => 'middle'
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
                        'vertical-aling' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],

            [
                'label' => 'Serviciu',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-aling' => 'middle'
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
                        'vertical-aling' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],

            [
                'label' => 'Utilizator',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-aling' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    if ($model->utilizator) {
                        return $model->utilizator->fullName();
                    }
                    return '-';
                }
            ],

            [
                'label' => 'Data și ora',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-aling' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return date('d-m-Y H:i', strtotime($model->programare_datetime));
                }
            ],

            [
                'label' => 'Este validată',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-aling' => 'middle'
                    ]
                ],
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->programare_validata_de) {
                        return $model->programare_validata_de;
                    }
                    return '<span class="text-danger font-italic font-weight-bold">În curs de validare ...</span>';

                }
            ],

            [
                'label' => 'Număr unic',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-aling' => 'middle'
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
                'class' => ActionColumn::className(),
                'template' => '{validare} {delete}',
                'buttons' => [
                    'validare' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-check-double mr-1"></i>Validare',
                            '#',
                            [
                                'class' => 'btn btn-success btn-sm btn-block btn-validare-programare',
                                'data-programare-id' => $data->id
                            ]);
                    },
                    'delete' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-trash mr-1"></i>Anulare',
                            '#',
                            [
                                'class' => 'btn btn-danger btn-sm btn-block btn-anulare-programare',
                                'data-programare-id' => $data->id
                            ]);
                    }

                ]
            ],
        ],
    ]); ?>
</div>

<?php
Modal::begin([
    'title' => '<h4 class="text-center text-success font-weight-bold">Sunteți sigur că doriți validarea programării?</h4>',
    'id' => 'modal-validare-programare',
    'size' => 'modal-lg',
    //'toggleButton' => ['label' => 'click me'],
]);

echo '<div id="modal-validare-programare-content"></div>';

Modal::end();
?>

<style>
    .modal-buttons{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }
</style>

<?php $this->registerJsFile("@web/js/plugins/views/programare/index.js"); ?>
