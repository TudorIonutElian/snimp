<?php

use common\models\Regiune;
use frontend\controllers\JudetController;
use frontend\controllers\ModelController;
use kartik\dialog\Dialog;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JudetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Județelor';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php JudetController::renderViewModal() ?>
<?php JudetController::renderAddModal() ?>
<?php JudetController::renderUpdateModal() ?>

<div class="judet-index">
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::button('Adaugă JUDEȚ', [
                    'value' => Url::to(['judet/create']),
                    'class' => 'btn btn-success mx-3',
                    'id' => 'add-judet-btn'
                ]) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'filterModel' => $searchModel,
        'striped' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '5%'
                    ]
                ],
            ],
            [
                'label' => 'Regiune Județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '20%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->regiune->regiune_nume;
                },
                'filter' => Select2::widget([
                    'name' => 'judet_regiune',
                    'value' => '',
                    'data' => ArrayHelper::map(Regiune::find()->all(), 'id', 'regiune_nume'),
                    'options' => ['multiple' => true, 'placeholder' => 'Selecteaza regiune ...']
                ])
            ],
            [
                'label' => 'Denumire',
                'attribute' => 'judet_nume',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '20%'
                    ]
                ],
            ],
            [
                'label' => 'Indicativ',
                'attribute' => 'judet_indicativ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '15%'
                    ]
                ],
            ],
            [
                'label' => 'Număr Localități',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '20%'
                    ]
                ],
                'value' => function ($model) {
                    return count($model->localitati);
                }
            ],

            [
                'header' => 'Acțiuni Județe',
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
                        return Html::button('<i class="fas fa-eye"></i>', [
                            'value' => Url::to($model),
                            'class' => 'btn btn-sm btn-outline-primary rounded view-judet-button'
                        ]);
                    },
                    'update' => function ($model) {
                        return Html::button('<i class="fas fa-edit"></i>', [
                            'value' => Url::to($model),
                            'class' => 'btn btn-sm btn-outline-secondary rounded update-judet-button'
                        ]);
                    },
                    'delete' => function ($model) {
                        $id_judet_final = ModelController::getIdFromModelString($model);
                        return Html::button('<i class="fas fa-trash-alt"></i>', [
                            'value' => Url::to($model),
                            'class' => 'btn btn-sm btn-outline-danger rounded delete-judet-button',
                            'data-judet-id' => $id_judet_final
                        ]);
                    }
                ]
            ],
        ],
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
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
        $(".delete-judet-button").on("click", function(e) {
            const idJudet = parseInt(this.attributes["data-judet-id"].value);
            krajeeDialog.confirm("Sunteți sigur că doriți să ștergeți Judetul?", function (result) {
                if (result) {
                    $.ajax({
                        url: 'index.php?r=judet/delete&id=' + idJudet,
                        method : 'post'
                    });
                }
            });
        });
JS;
// register your javascript
$this->registerJs($js);
?>
