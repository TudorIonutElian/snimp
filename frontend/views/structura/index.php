<?php

use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Structurilor Fundamentale';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structura-index">

    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă STRUCTURA', ['create'], ['class' => 'btn btn-success mx-3']) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Denumire Structura',
                'attribute' => 'structura_nume',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '25%'
                    ]
                ],

            ],
            [
                'label' => 'Data creare',
                'attribute' => 'structura_start_date',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '25%'
                    ]
                ],

            ],
            [
                'label' => 'Data radiere',
                'attribute' => 'structura_end_date',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '25%'
                    ]
                ],

            ],
            [
                'label' => 'Stare Structura',
                'format' => 'raw',
                'attribute' => 'structura_status',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '25%'
                    ]
                ],
                'value' => function ($model) {
                    if ($model->structura_status === 1) {
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
                'header' => 'Acțiuni Structuri',
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
                        return Html::a('<i class="fas fa-trash-alt"></i>', $model, ['class' => 'btn btn-sm btn-outline-danger rounded']);
                    }

                ],
            ]
        ]
    ]) ?>


</div>
