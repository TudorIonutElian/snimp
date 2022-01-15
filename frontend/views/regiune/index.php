<?php

use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RegiuneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomenclator Regiuni';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Adăugare Regiune Nouă</h2>',
    'id' => 'modal-adaugare-regiune',
    'size' => 'modal-md',
]);

echo '<div id="modal-adaugare-regiune-content"></div>';

Modal::end();
?>
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
                                    return Html::a('<i class="fas fa-eye"></i>', $model, ['class' => 'btn btn-sm btn-outline-primary rounded']);
                                },
                                'update' => function ($model) {
                                    return Html::a('<i class="fas fa-edit"></i>', $model, ['class' => 'btn btn-sm btn-outline-secondary rounded']);
                                },
                                'delete' => function ($model) {
                                    return Html::a('<i class="fas fa-trash-alt"></i>', $model, ['class' => 'btn btn-sm btn-outline-danger rounded', 'data-method' => 'post']);
                                }
                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
