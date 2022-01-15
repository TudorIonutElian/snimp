<?php

use common\models\Judet;
use common\models\Regiune;
use frontend\controllers\LocalitateController;
use frontend\controllers\ModelController;
use kartik\dialog\Dialog;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LocalitateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Localități';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php LocalitateController::renderViewModal() ?>
<?php LocalitateController::renderAddModal() ?>
<?php LocalitateController::renderUpdateModal() ?>

<div class="localitate-index">

    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::button('Adaugă LOCALITATE', [
                    'value' => Url::to(['localitate/create']),
                    'class' => 'btn btn-success mx-3',
                    'id' => 'add-localitate-btn'
                ]) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Denumire localitate',
                'attribute' => 'localitate_nume',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
            ],
            [
                'label' => 'Județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'localitate_judet',
                'value' => function ($model) {
                    return $model->judet->judet_nume;
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ArrayHelper::map(Judet::find()->all(), 'id', 'judet_nume'),
                    'options' => ['multiple' => false, 'placeholder' => 'Județ ...']
                ])
            ],
            [
                'label' => 'Regiune',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'value' => function ($model) {
                    return $model->judet->regiune->regiune_nume;
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ArrayHelper::map(Regiune::find()->all(), 'id', 'regiune_nume'),
                    'options' => ['multiple' => false, 'placeholder' => 'Regiune ...']
                ])
            ],
            [
                'label' => 'Urban / Rural',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'localitate_urban',
                'value' => function ($model) {
                    if ($model->localitate_urban === 1) {
                        return '<span>DA</span>';
                    }
                    return '<span>NU</span>';
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ['0' => 'Rural', '1' => 'Urban'],
                    'options' => ['multiple' => false, 'placeholder' => 'Urban / Rural ...']
                ])
            ],
            [
                'label' => 'Rețedință de județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'localitate_resedinta',
                'value' => function ($model) {
                    if ($model->localitate_resedinta === 1) {
                        return '<span>DA</span>';
                    }
                    return '<span>NU</span>';
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ['0' => 'Nu', '1' => 'Da'],
                    'options' => ['multiple' => false, 'placeholder' => 'Reședință ...']
                ])
            ],
            [
                'label' => 'Stare',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'localitate_status',
                'value' => function ($model) {
                    if ($model->localitate_status === 1) {
                        return '<span class="text-success font-weight-bold">Activă</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Inactivă</span>';
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'options' => ['multiple' => false, 'placeholder' => 'Stare ...']
                ])
            ],

            [
                'header' => 'Acțiuni Localități',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '5%'
                    ]
                ],
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($model) {
                        $id_localitate_final = ModelController::getIdFromModelString($model);
                        return Html::button('<i class="fas fa-eye"></i>', [
                            'value' => Url::to($model),
                            'class' => 'btn btn-sm btn-outline-primary rounded view-localitate-button'
                        ]);
                    },
                    'update' => function ($model) {
                        return Html::button('<i class="fas fa-edit"></i>', [
                            'value' => Url::to($model),
                            'class' => 'btn btn-sm btn-outline-secondary rounded update-localitate-button'
                        ]);
                    },
                    'delete' => function ($model) {
                        $id_localitate_final = ModelController::getIdFromModelString($model);
                        return Html::button('<i class="fas fa-trash-alt"></i>', [
                            'value' => Url::to($model),
                            'class' => 'btn btn-sm btn-outline-danger rounded delete-localitate-button',
                            'data-localitate-id' => $id_localitate_final]);
                    }
                ]
            ],
        ],

    ]); ?>
</div>

<?php
// widget with default options
echo Dialog::widget([
    'options' => [
        'size' => Dialog::SIZE_MEDIUM,
        'type' => Dialog::TYPE_INFO,
        'message' => 'This is an entirely customized bootstrap dialog from scratch. Click buttons below to test this:',
        'draggable' => false,
        'closable' => true,
    ]
]);
$js = <<< JS
        $(".delete-localitate-button").on("click", function(e) {
            const idLocalitate = parseInt(this.attributes["data-localitate-id"].value);
            krajeeDialog.confirm("Sunteți sigur că doriți să ștergeți Localitatea?", function (result) {
                if (result) {
                    $.ajax({
                        url: 'index.php?r=localitate/delete&id=' + idLocalitate,
                        method : 'post'
                    });
                }
            });
        });
JS;
// register your javascript
$this->registerJs($js);
?>
