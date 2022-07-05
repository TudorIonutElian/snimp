<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Ministerelor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minister-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă MINISTER', ['create'], ['class' => 'btn btn-success mx-3']) ?>
            </div>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ]
            ],
            [
                'label' => 'Denumire minister',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'minister_denumire'
            ],
            [
                'label' => 'Localitate',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'minister_localitate',
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],
            [
                'label' => 'Județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'value' => function ($model) {
                    return $model->localitate->judet->judet_nume;
                }
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
                    return $model->localitate->judet->regiune->regiune_nume;
                }
            ],
            [
                'label' => 'Adresa',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'minister_adresa'
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
                'attribute' => 'minister_status',
                'value' => function ($model) {
                    if ($model->minister_status === 1) {
                        return '<span class="text-success font-weight-bold">Activ</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Inactiv</span>';
                }
            ],

            //'',

            [
                'header' => 'Acțiuni Ministere',
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
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
        ],
    ]); ?>


</div>
