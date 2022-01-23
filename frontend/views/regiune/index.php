<?php

use frontend\controllers\ModelController;
use kartik\dialog\Dialog;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RegiuneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomenclator Regiuni';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \frontend\controllers\RegiuneController::renderViewModal()?>
<?php \frontend\controllers\RegiuneController::renderAddModal()?>
<?php \frontend\controllers\RegiuneController::renderUpdateModal()?>


<div class="container mb-3">
    <div class="row">
        <div class="col-12 text-center col-flex-row">
            <h1><?= Html::encode($this->title) ?></h1>
            <?= Html::button('Adaugă REGIUNE', [
                'value' => Url::to(['regiune/create']),
                'class' => 'btn btn-success mx-3',
                'id' => 'add-regiune-btn']) ?>
        </div>
    </div>
</div>
<div class="regiune-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'filterModel' => $searchModel,
                    'striped' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'Denumire Regiune',
                            'value' => 'regiune_nume',
                            'attribute' => 'regiune_nume',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ]
                        ],
                        [
                            'label' => 'Stare Regiune',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->regiune_status === 1) {
                                    return '<span>Activa</span>';
                                } else {
                                    return '<span>Inactiva</span>';
                                }
                            },
                            'filter' => Select2::widget(
                                [
                                    'model' => $searchModel,
                                    'attribute' => 'regiune_status',
                                    'data' => [
                                        '0' => 'Inactiva',
                                        '1' => 'Activa'
                                    ],
                                    'options' => ['placeholder' => ' Stare '],
                                    'language' => 'en',
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]
                            ),
                        ],
                        [
                            'label' => 'Număr județe',
                            'format' => 'raw',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'value' => function ($model) {
                                return '<span class="font-weight-bold">' . count($model->judete) . '</span>';
                            }
                        ],
                        [
                            'label' => 'Data creare regiune',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'attribute' => 'regiune_created',
                        ],

                        [
                            'header' => 'Acțiuni Regiuni',
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
                                    $id_regiune_final = ModelController::getIdFromModelString($model);

                                    return Html::button('<i class="fas fa-eye"></i>', [
                                        'value' => Url::to($model),
                                        'class' => 'btn btn-sm btn-outline-primary rounded view-regiune-button']);
                                },
                                'update' => function ($model) {
                                    $id_regiune_final = ModelController::getIdFromModelString($model);

                                    return Html::button('<i class="fas fa-edit"></i>', [
                                        'value' => Url::to(['regiune/update', 'id' => $id_regiune_final]),
                                        'class' => 'btn btn-sm btn-outline-secondary rounded update-regiune-button',
                                        'data-regiune-id' => $id_regiune_final
                                    ]);
                                },
                                'delete' => function ($model) {
                                    $id_regiune_final = ModelController::getIdFromModelString($model);

                                    return Html::button('<i class="fas fa-trash-alt"></i>', [
                                        'value' => $model,
                                        'class' => 'btn btn-sm btn-outline-danger rounded delete-regiune-button',
                                        'data-regiune-id' => $id_regiune_final
                                    ]);
                                }
                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
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
        $(".delete-regiune-button").on("click", function(e) {
            const idRegiune = parseInt(this.attributes["data-regiune-id"].value);
            
            krajeeDialog.confirm("Sunteți sigur că doriți să ștergeți Regiunea?", function (result) {
                if (result) {
                    console.log(idRegiune);
                    $.ajax({
                        url: 'index.php?r=regiune/delete&id=' + idRegiune,
                        method : 'post'
                    });
                }
            });
        });
JS;
// register your javascript
$this->registerJs($js);
?>


<script>
    $('#modal-adaugare-regiune').removeAttr('tabindex');
</script>
